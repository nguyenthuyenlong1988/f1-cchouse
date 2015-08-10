<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: HomeController.php,v 1.0 2015/05/27 03:14 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Get last posts
        $tthd = $this->_getPostsByTaxonomy('category', 'publish', 'hoat-dong')
                     ->take(3)
                     ->get();

        $pb = $this->_getPostsByTaxonomy('category', 'publish', 'phong')
                   ->take(3)
                   ->get();

        $hdttn = $this->_getPostsByTaxonomy('category', 'publish', 'hoat-dong-ttn')
                      ->take(3)
                      ->get();

        $gmn = $this->_getPostsByTaxonomy('category', 'publish', 'goc-mang-non')
                    ->take(3)
                    ->get();

        return view('home.index', compact('tthd', 'pb', 'hdttn', 'gmn'));
    }

    public function page($page)
    {
        $pages = [
            'chao-mung'  => [
                'name'     => 'welcome',
                'template' => 'pages.welcome'
            ],
            'gioi-thieu' => [
                'name'     => 'intro',
                'template' => 'pages.intro'
            ],
            'lien-he'    => [
                'name'     => 'contact',
                'template' => 'pages.contact'
            ],
            'lich-hoc'   => [
                'name'     => 'schedule',
                'template' => 'pages.schedule'
            ],
            'chieu-sinh' => [
                'name'     => 'enrolstudents',
                'template' => 'pages.enrolstudents'
            ]
        ];

        if (! isset($pages[ $page ])) {
            return response()->view("errors.404", ['exception' => NULL], 404);
        }

        return view($pages[ $page ]['template']);
    }

    /**
     * @param $taxonomy
     * @param $status
     * @param $slug
     *
     * @return mixed
     */
    private function _getPostsByTaxonomy($taxonomy, $status, $slug)
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
                      'p.post_name',
                      'p.post_avatar',
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
                  ->where(function ($q) use ($slug) {
                      $q->where('t.term_slug', '=', $slug)
                        ->orWhere('t.term_slug', 'like', \DB::raw("'$slug/%'"));
                  })
                  ->orderBy('p.id', 'DESC');
    }
}
