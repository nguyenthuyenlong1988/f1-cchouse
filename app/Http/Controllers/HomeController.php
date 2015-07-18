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
}
