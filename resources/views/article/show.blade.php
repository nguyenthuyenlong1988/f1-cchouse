{{-- Created at 2015/07/30 11:57 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', $article->post_title)
@section('page_body_attributes')
id="actnews-show" class="actnews-page"
@stop

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')
@parent

<link rel="stylesheet" href="app-home/actnews.css" media="all" />

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('content')

<?php $author = $article->author()->select('id', 'name')->first(); ?>

<div class="container-fluid">

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
      <li>
        <a href="{{ route('article.index', $termCategory->term_slug) }}">{{ $termCategory->term_name }}</a>
      </li>
    </ol>
  </div>

  {{-- PAGE HEADER --}}

  <h1 class="page-header header-large">{{ $article->post_title }}</h1>

  {{-- CONTENT --}}

  @unless(empty($article->post_avatar))
  <div class="post-avatar">
    <img src="{{ route('_image.index') }}/{{ $article->post_avatar }}" alt="" />
  </div>
  @endunless
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-7">
      <div class="post post-first">
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($article->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        <div class="post-content">{!! $article->post_content !!}</div>
      </div>

      <hr class="sepace" />

      <div class="fb-like" data-href="{{ Request::url() }}" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>

      <h2 class="comment-header">Bình luận</h2>
      <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
    </div>
    <div class="col-md-3">

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

      @include('_shared.common.facebook_fanpage')

    </div>
  </div>
</div>

@stop
