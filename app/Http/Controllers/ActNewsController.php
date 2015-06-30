<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: ActNewsController.php,v 1.0 2015/06/27 01:44 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers;

use NhaThieuNhi\Post;
use Vinkla\Hashids\Facades\Hashids;

class ActNewsController extends Controller
{
    public function index()
    {
        $actNews = Post::where([
            'post_type'   => 'act_news',
            'post_status' => 'publish'
        ])
                       ->orderBy('id', 'DESC')
                       ->get();

        return view('actnews.index', compact('actNews'));
    }

    public function show($uri)
    {
        $id = Hashids::decode(ivy_last_word($uri, '-'))[0];

        $actNews = Post::find($id);
        if (count($actNews) == 0) {
            return redirect()->route('actnews.index', ['error' => '404']);
        }

        return view('actnews.show', compact('actNews'));
    }
}