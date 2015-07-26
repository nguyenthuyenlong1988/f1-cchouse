{{-- Created at 2015/06/27 04:21 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', $actNews->post_title)
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

<?php $author = $actNews->author()->select('id', 'name')->first(); ?>

<div class="container-fluid">
  <h1 class="page-header header-large">{{ $actNews->post_title }}</h1>
  @unless(empty($actNews->post_avatar))
  <div class="post-avatar">
    <img src="{{ route('_image.index') }}/{{ $actNews->post_avatar }}" alt="" />
  </div>
  @endunless
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-7">
      <div class="post post-first">
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($actNews->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        <div class="post-content">{!! $actNews->post_content !!}</div>
      </div>

      <hr class="sepace" />

      <div class="fb-like" data-href="{{ Request::url() }}" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>

      <h2 class="comment-header">Bình luận</h2>
      <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
    </div>
    <div class="col-md-3">
      <div>
        <div class="fb-page" data-href="https://www.facebook.com/nhathieunhigovap2004" data-width="220" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
          <div class="fb-xfbml-parse-ignore"></div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
