{{-- Created at 2015/06/27 02:12 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', 'Tin tức Hoạt động')
@section('page_body_attributes')
id="actnews-index" class="actnews-page"
@stop

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')

@parent
<link rel="stylesheet" href="app-home/actnews.css" media="all" />

@stop

@section('page_js_load')

<script src="assets/libs/jquery-jcarousel/0.3.3/js/jquery.jcarousel.min.js"></script>
@parent
<script src="app-home/actnews.js"></script>

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('content')

<div class="container-fluid">
  @if (Request::input('error'))
  <div class="alert alert-danger">
    Không tìm thấy trang! Bạn vừa yêu cầu bài viết không tồn tại.
  </div>
  @endif

  <h1 class="page-header">
    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
    Tin tức &mdash; Hoạt động
  </h1>
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-7">
      @forelse($actNews as $key => $p)
      <?php $author = $p->author()->select('id', 'name')->first();
            $postId = Hashids::encode($p->id); ?>
      @if ($key == 0) {{-- First post --}}

      <div class="post post-first">
        <h2 class="post-title">
          <a href="{{ route('actnews.show', $p->post_name . '-' . $postId) }}">{{ $p->post_title }}</a>
        </h2>
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($p->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        @unless(empty($p->post_avatar))
        <div class="post-avatar">
          <a href="{{ route('actnews.show', $p->post_name . '-' . $postId) }}">
            <img src="{{ route('_image.index') }}/{{ $p->post_avatar }}" alt="" />
          </a>
        </div>
        @endunless
        <div class="post-excerpt">{{ $p->post_excerpt }}</div>
      </div>

      @else {{-- Continue posts --}}

      <div class="post">
        <h2 class="post-title">
          <a href="{{ route('actnews.show', $p->post_name . '-' . $postId) }}">{{ $p->post_title }}</a>
        </h2>
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($p->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        @unless(empty($p->post_avatar))
        <div class="post-avatar">
          <a href="{{ route('actnews.show', $p->post_name . '-' . $postId) }}">
            <img src="{{ route('_image.index') }}/{{ $p->post_avatar }}" alt="" />
          </a>
        </div>
        @endunless
        <div class="post-excerpt">{{ $p->post_excerpt }}</div>
      </div>

      @endif
      @empty
      <p>Chưa có dữ liệu.</p>
      @endforelse
    </div>
    <div class="sidebar col-md-3">

      @include('_shared.common.facebook_fanpage')

      @include('_shared.home.actpics')

      @include('_shared.home.film3d')

    </div>
  </div>
</div>

@stop
