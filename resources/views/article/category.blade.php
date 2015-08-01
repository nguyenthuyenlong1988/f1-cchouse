{{-- Created at 2015/07/30 13:42 htien Exp $ --}}
@extends('_layouts.home.main_page')

@section('page_title', $termCategory->term_name)
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

  {{-- BREADCRUMB --}}

  <div>
    <ol class="breadcrumb">
      <li>
        <a href="{{ route('article.index') }}">Tin tức</a>
      </li>
      @foreach ($parentCategories as $t)
      <li>
        <a href="{{ route('article.index', $t->term_slug) }}">{{ $t->term_name }}</a>
      </li>
      @endforeach
      <li class="active">{{ $termCategory->term_name }}</li>
    </ol>
  </div>

  {{-- PAGE HEADER --}}

  <h1 class="page-header">
    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
    {{ $termCategory->term_name }}
  </h1>

  {{-- COLUMNS & CONTENT --}}

  <div class="row">

    <div class="col-md-6 col-md-push-3">
      @forelse ($articles as $key => $p)
      <?php $author = $p->author()->select('id', 'name')->first();
            $postId = Hashids::encode($p->id); ?>
      @if ($key == 0) {{-- First post --}}

      <div class="post post-first">
        <h2 class="post-title">
          <a href="{{ route('article.index', $termCategory->term_slug . '/' . $p->post_name . '--' . $postId) }}">{{ $p->post_title }}</a>
        </h2>
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($p->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        @unless (empty($p->post_avatar))
        <div class="post-avatar">
          <a href="{{ route('article.index', $termCategory->term_slug . '/' . $p->post_name . '--' . $postId) }}">
            <img src="{{ route('_image.index') }}/{{ $p->post_avatar }}" alt="" />
          </a>
        </div>
        @endunless
        <div class="post-excerpt">{{ $p->post_excerpt }}</div>
      </div>

      @else {{-- Continue posts --}}

      <div class="post">
        <h2 class="post-title">
          <a href="{{ route('article.index', $termCategory->term_slug . '/' . $p->post_name . '--' . $postId) }}">{{ $p->post_title }}</a>
        </h2>
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($p->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        @unless (empty($p->post_avatar))
        <div class="post-avatar">
          <a href="{{ route('article.index', $termCategory->term_slug . '/' . $p->post_name . '--' . $postId) }}">
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

    <div class="sidebar col-md-3 col-md-pull-6">

      <div class="box category-widget">
        <h4 class="box-title"><span>Mục liên quan</span></h4>
        <div>
          <div class="list-group">
            @foreach ($relCategories as $t)
            <a class="list-group-item" href="{{ route('article.index', $t->term_slug) }}">
              <span class="badge">{{ $t->term_taxonomy_count }}</span>
              <h4 class="list-group-item-heading">{{ $t->term_name }}</h4>
              <p class="list-group-item-text">{{ $t->term_taxonomy_description }}</p>
            </a>
            @endforeach
          </div>
        </div>
      </div>

    </div>

    <div class="sidebar col-md-3">

      @include('_shared.home.actpics')

      @include('_shared.home.film3d')

      @include('_shared.common.facebook_fanpage')

    </div>
  </div>
</div>

@stop
