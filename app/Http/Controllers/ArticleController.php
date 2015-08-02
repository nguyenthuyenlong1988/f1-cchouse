<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: ArticleController.php,v 1.0 2015/07/29 04:11 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers;

use NhaThieuNhi\Post;
use NhaThieuNhi\PostTaxonomy;
use NhaThieuNhi\Term;

class ArticleController extends Controller
{
    public function index($uri = NULL)
    {
        if (NULL === $uri) {
            return response()->redirectToRoute('page', 'chao-mung');
        }

        $infoUri = $this->_parseUri($uri);

        // Check term_slug is exists in database and any taxonomy is 'category'.
        $requestTerm = $this->_getTermBySlug($infoUri['term_slug'], 'category');

        if (! ($isArticle = $infoUri['post_id'] > 0) AND NULL === $requestTerm) {
            return response()->view("errors.404", ['exception' => NULL], 404);
        }

        // Check URI is reference to category or article...

        if ($isArticle) { // If URI reference to article...
            // Check post_id is belongs to specific 'category'.
            $hasTaxonomy = $this->_hasTaxonomy( // exists in database
                'category',
                $infoUri['post_id'],
                isset($requestTerm->term_taxonomy_id) ? $requestTerm->term_taxonomy_id : NULL
            );

            if (! ($hasTaxonomy XOR NULL === $requestTerm)
                OR (! $hasTaxonomy AND $infoUri['term_slug'] !== '')
            ) {
                return response()->view("errors.404", ['exception' => NULL], 404);
            }

            $article = Post::find($infoUri['post_id']);

            if (NULL === $article) {
                return response()->view("errors.404", ['exception' => NULL], 404);
            }

            $termCategory     = &$requestTerm;
            $parentCategories = $this->_getTermsBySlugSegments($infoUri['term_slugs']);
            $relCategories    = $this->_getTermsByParent($termCategory->id);

            return view('article.show', compact(
                'article', 'termCategory',
                'parentCategories', 'relCategories'
            ));
        }
        else { // If URI reference to category...
            // List of articles has same term_slug
            $articles         = $this->_getPostsByTermTaxonomy($requestTerm->term_taxonomy_id);
            $termCategory     = &$requestTerm;
            $parentCategories = $this->_getTermsBySlugSegments($infoUri['term_slugs']);
            $relCategories    = $this->_getTermsByParent($termCategory->id);

            if ($relCategories->count() == 0 AND $parentCategories->count() - 1 >= 0) {
                $relCategories = $this->_getTermsByParent($parentCategories[ $parentCategories->count() - 1 ]->id);
            }

            return view('article.category', compact(
                'articles', 'termCategory',
                'parentCategories', 'relCategories'
            ));
        }
    }

    /**
     * @param $slug
     * @param $taxonomy
     *
     * @return mixed
     */
    private function _getTermBySlug($slug, $taxonomy)
    {
        // Deprecated: select by 2 queries.
//        return Term::where('term_slug', $slug)
//                   ->with([
//                       'taxonomy' => function ($q) use ($taxonomy) {
//                           $q->select(['id', 'term_id'])
//                             ->where('taxonomy', $taxonomy)
//                             ->limit(1);
//                       }
//                   ])
//                   ->first(['id', 'term_name', 'term_slug']);

        // new: select query with inner join.
        return Term::join(
            'term_taxonomy',
            function ($join) use ($taxonomy) {
                $join->on('term_taxonomy.term_id', '=', 'terms.id')
                     ->on('term_taxonomy.taxonomy', '=', \DB::raw("'$taxonomy'"));
            }
        )->where('term_slug', $slug)->first([
            'terms.id',
            'terms.term_name',
            'terms.term_slug',
            'term_taxonomy.id as term_taxonomy_id',
            'term_taxonomy.count as term_taxonomy_count'
        ]);
    }

    private function _getTermsBySlugs(array $slugs)
    {
        return Term::whereIn('term_slug', $slugs)
                   ->get(['id', 'term_name', 'term_slug']);
    }

    private function _getTermsByParent($id)
    {
        return Term::join(
            'term_taxonomy',
            function ($join) use ($id) {
                $join->on('term_taxonomy.term_id', '=', 'terms.id')
                     ->on('term_taxonomy.parent', '=', \DB::raw($id));
            }
        )->get([
            'terms.id',
            'terms.term_name',
            'terms.term_slug',
            'term_taxonomy.id as term_taxonomy_id',
            'term_taxonomy.description as term_taxonomy_description',
            'term_taxonomy.count as term_taxonomy_count'
        ]);
    }

    private function _getTermsBySlugSegments(array $slugs, $popLast = TRUE)
    {
        if (empty($slugs) OR count($slugs) == 0) {
            return NULL;
        }

        $values = [];

        for ($i = 0; $i < count($slugs) - 1; $i++) {
            $values[] = ($i != 0 ? $values[ $i - 1 ] . '/' : '') . $slugs[ $i ];
        }

        return $this->_getTermsBySlugs($values);
    }

    /**
     * @param $taxonomy
     * @param $postId
     * @param $termTaxonomyId
     *
     * @return bool
     */
    private function _hasTaxonomy($taxonomy, $postId, $termTaxonomyId)
    {
        if (empty($termTaxonomyId)) {
            return
                // Deprecated: I don't play with subquery.
//                PostTaxonomy::where([
//                    'object_id' => $postId
//                ])
//                            ->whereHas('taxonomy',
//                                function ($q) use ($taxonomy) {
//                                    $q->where('taxonomy', $taxonomy);
//                                })
//                            ->count() > 0;

                PostTaxonomy::join(
                    'term_taxonomy',
                    function ($join) use ($taxonomy) {
                        $join->on('term_taxonomy.id', '=', 'post_taxonomy.term_taxonomy_id')
                             ->on('term_taxonomy.taxonomy', '=', \DB::raw("'$taxonomy'"));
                    }
                )->where('object_id', $postId)->count() > 0;
        }

        return
            PostTaxonomy::where([
                'object_id'        => $postId,
                'term_taxonomy_id' => $termTaxonomyId
            ])->count() > 0;
    }

    private function _getPostsByTermTaxonomy($id)
    {
        return Post::join(
            'post_taxonomy',
            function ($join) use ($id) {
                $join->on('post_taxonomy.object_id', '=', 'posts.id')
                     ->on('post_taxonomy.term_taxonomy_id', '=', \DB::raw($id));
            }
        )->where([
            'post_type'   => 'post',
            'post_status' => 'publish'
        ])->orderBy('id', 'DESC')->get([
            'posts.id',
            'posts.post_author',
            'posts.post_date',
            'posts.post_title',
            'posts.post_excerpt',
            'posts.post_name',
            'posts.post_avatar',
            'posts.updated_at'
        ]);
    }

    /**
     * Parse URI to array.
     *
     * @param $uri
     *
     * @return array
     */
    private function _parseUri($uri)
    {
        $termSlugs = explode('/', $uri); // split URI into an array, delimited by /.
        $postId    = 0;

        if (end($termSlugs)) { // set array pointer to last element.
            // split article name & hashid into an array, delimited by --.
            $split = preg_split('/^(.*)-{2}/', current($termSlugs), -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

            if (count($split) == 2) { // has hashid
                array_pop($termSlugs);
                $id = \Hashids::decode($split[1]);

                if (count($id) == 1 AND is_numeric($id[0])) {
                    $postId = $id[0];
                }
            }
        }

        $termSlug = implode('/', $termSlugs);

        return [
            'origin'     => $uri,
            'term_slugs' => $termSlugs, // array of slugs.
            'term_slug'  => $termSlug, //  full string of slug.
            'post_id'    => $postId,
        ];
    }

    /**
     * For testing.
     *
     * @param $uriInfo
     *
     * @return string
     */
    private function _test($uriInfo)
    {
        $s = NULL;
        foreach ($uriInfo['term_slugs'] as $term) {
            $s .= $term . ', ';
        }

        return "<code>$s | <br />TERM_SLUG: $uriInfo[term_slug], <br />POST_ID: $uriInfo[post_id], <br />URI: $uriInfo[origin], <br />TERM_SLUG EXISTS: "
               . ($this->_getTermBySlug($uriInfo['term_slug'], 'category')
                       ->count() == 1 ? 'true' : 'false') . '</code>';
    }
}