{{-- Created at 2015/06/27 04:21 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', $actNews->post_title)
@section('page_body_attributes')
id="actnews-show" class="actnews-page"
@stop

@section('page_css')
@parent

<link rel="stylesheet" href="css/actnews.css" media="all" />

@stop

@section('content')

<?php $author = $actNews->author()->select('id', 'name')->first(); ?>

<div class="container-fluid">
  <h1 class="page-header">{{ $actNews->post_title }}</h1>
  @unless(empty($actNews->post_avatar))
  <div class="post-avatar">
    <img src="{{ $actNews->post_avatar }}" alt="" />
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
      <div style="margin-bottom:10px;padding:10px;background-color:#fff;border:1px solid #e2e2e2;border-radius:2px">
        <h4>Slide hình</h4>
        <ul class="no-bullets">
          @for ($i = 0; $i < 12; $i++)
          <li>&nbsp;</li>
          @endfor
        </ul>
      </div>

      <div style="margin-bottom:10px;padding:10px;background-color:#c3d339;border:3px solid #c3d339;border-radius:2px">
        <h4>Phòng Chiếu Phim 3D</h4>
        @for ($i = 0; $i < 5; $i++)
        <br />
        @endfor
      </div>

      <div style="margin-bottom:10px;padding:10px;background-color:#f0f2b6;border:1px solid #c3d339;border-radius:2px">
        <h4>Đặt quảng cáo nhà tài trợ</h4>
        @for ($i = 0; $i < 5; $i++)
        <br />
        @endfor
      </div>
    </div>
  </div>
</div>

@stop
