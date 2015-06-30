<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: PostController.php,v 1.0 2015/06/21 09:24 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers\Admin;

use NhaThieuNhi\Http\Controllers\Controller;
use NhaThieuNhi\Http\Requests\PostFormRequest;
use NhaThieuNhi\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::where([
            'post_type'   => 'act_news',
            'post_status' => 'publish'
        ])
                     ->orderBy('id', 'DESC')
                     ->get();

        $countPublished = count($posts);

        $countDeleted = Post::onlyTrashed()->where([
            'post_type'   => 'act_news',
            'post_status' => 'publish'
        ])->count();

        return view('post.admin_index', [
            'posts'          => $posts,
            'countPublished' => $countPublished,
            'countDeleted'   => $countDeleted
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('post.admin_create');
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

        $post = Post::create([
            'post_author'  => \Auth::user()->id,
            'post_date'    => (new \DateTime())->getTimestamp(),
            'post_type'    => 'act_news',
            'post_status'  => 'publish',
            'post_title'   => $title,
            'post_excerpt' => $excerpt,
            'post_content' => $content,
            'post_name'    => $name,
            'post_avatar'  => $avatar,
        ]);

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

        return view('post.admin_show', ['post' => $post]);
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
        $post = Post::find($id);

        return view('post.admin_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param PostFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, PostFormRequest $request)
    {
        $post = Post::find($id);
        $post->update([
            'post_title'   => $request->input('post_title'),
            'post_excerpt' => $request->input('post_excerpt'),
            'post_content' => $request->input('post_content'),
            'post_name'    => '',
            'post_avatar'  => $request->input('post_avatar'),
        ]);

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
}