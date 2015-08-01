<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: HomeController.php,v 1.0 2015/05/27 03:14 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers;

use NhaThieuNhi\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Gets 4 last posts (post_type='act_news)
        $actNews = Post::where([
            'post_type'   => 'act_news',
            'post_status' => 'publish'
        ])
                       ->orderBy('id', 'DESC')
                       ->take(3)
                       ->get();

        return view('home.index', compact('actNews'));
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
}
