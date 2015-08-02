<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: PostController.php,v 1.0 2015/06/21 09:24 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers\Admin;

use Carbon\Carbon;
use NhaThieuNhi\Http\Controllers\Controller;
use NhaThieuNhi\Http\Requests\PostFormRequest;
use NhaThieuNhi\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = $this->_processPosts(
            $this->_getPostsByTaxonomy('category', 'publish')->get()
        );

        $countPublished = count($posts);

        $countDeleted = Post::onlyTrashed()->where([
            'post_type'   => 'post',
            'post_status' => 'publish'
        ])->count();

        return view('post.admin_index', compact('posts', 'countPublished', 'countDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->_processCategories(
            $this->_getCategories()->get()
        );

        return view('post.admin_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostFormRequest $request)
    {
        $title   = trim($request->input('post_title'));
        $excerpt = trim($request->input('post_excerpt'));
        $content = trim($request->input('post_content'));
        $name    = str_slug($title);
        $avatar  = trim($request->input('post_avatar'));

        $newCategory = $request->input('post_category');

        $post = Post::create([
            'post_author'  => \Auth::user()->id,
            'post_date'    => (new \DateTime())->getTimestamp(),
            'post_type'    => 'post',
            'post_status'  => 'publish',
            'post_title'   => $title,
            'post_excerpt' => $excerpt,
            'post_content' => $content,
            'post_name'    => $name,
            'post_avatar'  => $avatar,
        ]);

        $post->taxonomy()->attach($newCategory);

        return redirect()->route('admin::@dmin-zone.posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = Post::with([
            'author' => function ($query) {
                $query->select('id', 'name');
            }
        ])->find($id);

        if (! $post) {
            return redirect()->route('admin::@dmin-zone.posts.index');
        }

        $category = $post->taxonomy()->first()->term()->first();

        return view('post.admin_show', compact('post', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post       = Post::find($id);
        $category   = $post->taxonomy()->first();
        $categories = $this->_processCategories(
            $this->_getCategories()->get()
        );

        return view('post.admin_edit', compact('post', 'category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param                 $id
     * @param PostFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, PostFormRequest $request)
    {
        $post = Post::find($id);

        $title       = $request->input('post_title');
        $newCategory = $request->input('post_category');

        $post->update([
            'post_title'    => trim($title),
            'post_excerpt'  => trim($request->input('post_excerpt')),
            'post_content'  => trim($request->input('post_content')),
            'post_name'     => str_slug($title),
            'post_avatar'   => trim($request->input('post_avatar')),
        ]);

        $taxonomy = $post->taxonomy();
        $taxonomy->updateExistingPivot($taxonomy->first()->id, ['term_taxonomy_id' => $newCategory]);

        return redirect()->route('admin::@dmin-zone.posts.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('admin::@dmin-zone.posts.index');
    }

    private function _getCategories()
    {
        return \DB::table('terms as t')
                  ->join('term_taxonomy as tt', 'tt.term_id', '=', 't.id')
                  ->select(
                      't.id',
                      't.term_name',
                      't.term_slug',
                      'tt.id as term_taxonomy_id',
                      'tt.parent'
                  )
                  ->where('tt.taxonomy', 'category')
                  ->where('tt.id', '<>', 1);
    }

    private function _processCategories(array $categories)
    {
        $_root = [];

        foreach ($categories as $cat) {
            if ($cat->parent == 0) {
                $_root[] = $cat;
            }
        }

        $results = [];

        foreach ($_root as $cat) {
            $this->_pickCategories($cat, $categories, $results);
        }

        return $results;
    }

    private function _pickCategories($cat, array &$data, array &$results)
    {
        $results[] = (object) [
            'name'  => $cat->term_name,
            'value' => $cat->term_taxonomy_id,
        ];
        $this->_pickSubCategories($data, $cat->id, $results);

        return $results;
    }

    private function _pickSubCategories(array $categories, $id, array &$results, $level = '----')
    {
        $_listCates = [];

        foreach ($categories as $cat) {
            if ($id == $cat->parent) {
                $_listCates[] = $cat;
            }
        }

        if (count($_listCates) > 0) {
            foreach ($_listCates as $cat) {
                $results[] = (object) [
                    'name'  => $level . ' ' . $cat->term_name,
                    'value' => $cat->term_taxonomy_id
                ];

                $this->_pickSubCategories($categories, $cat->id, $results, $level . $level);
            }
        }

    }

    /**
     * @param $taxonomy
     * @param $status
     *
     * @return mixed
     */
    private function _getPostsByTaxonomy($taxonomy, $status)
    {
        return \DB::table('posts as p')
                  ->join('post_taxonomy as pt', 'pt.object_id', '=', 'p.id')
                  ->join('term_taxonomy as tt', 'tt.id', '=', 'pt.term_taxonomy_id')
                  ->join('terms as t', 't.id', '=', 'tt.term_id')
                  ->leftJoin('users as u', 'u.id', '=', 'p.post_author')
                  ->distinct()
                  ->select(
                      'p.id',
                      'p.post_date',
                      'p.post_title',
                      'p.post_excerpt',
                      'p.updated_at',
                      't.id as term_id',
                      't.term_name',
                      't.term_slug',
                      'u.id as author_id',
                      'u.name as author_name'
                  )
                  ->where([
                      'p.deleted_at'  => NULL,
                      'p.post_type'   => 'post',
                      'p.post_status' => $status,
                      'tt.taxonomy'   => $taxonomy,
                  ])
                  ->orWhere('p.post_author', '')
                  ->orderBy('p.id', 'DESC');
    }

    /**
     * @param array $posts
     *
     * @return array
     */
    private function _processPosts(array $posts)
    {
        $uniqueIds = [];
        $results   = [];

        foreach ($posts as $p) {
            if (! in_array($p->id, $uniqueIds)) {
                $uniqueIds[]       = $p->id;
                $results[ $p->id ] = (object) [
                    'id'           => $p->id,
                    'post_date'    => Carbon::createFromTimestamp($p->post_date),
                    'post_title'   => $p->post_title,
                    'post_excerpt' => $p->post_excerpt,
                    'updated_at'   => Carbon::createFromTimestamp($p->updated_at),
                    'categories'   => [
                        (object) [
                            'id'   => $p->term_id,
                            'name' => $p->term_name,
                            'slug' => $p->term_slug,
                        ]
                    ],
                    'author_id'    => $p->author_id,
                    'author_name'  => $p->author_name,
                ];
            }
            else {
                $_p               = &$results[ $p->id ];
                $_p->categories[] = (object) [
                    'id'   => $p->term_id,
                    'name' => $p->term_name,
                    'slug' => $p->term_slug,
                ];
            }
        }

        return $results;
    }
}