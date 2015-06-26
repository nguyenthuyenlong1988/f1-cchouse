{{-- Created at 2015/06/27 02:12 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', 'Tin tức Hoạt động')
@section('page_body_attributes')
id="actnews-page"
@stop

@section('page_css')
@parent

<link rel="stylesheet" href="css/actnews.css" media="all" />

@stop

@section('content')

<div class="container-fluid">
  <h1 class="page-header">Tin tức &mdash; Hoạt động</h1>
  <div class="row">
    <div class="col-md-8">
      @forelse($actNews as $key => $p)
      <?php $author = $p->author()->select('id', 'name')->first(); ?>
      @if ($key == 0)

      <div class="post post-first">
        <h2 class="post-title"><a href="javascript:void(0)">{{ $p->post_title }}</a></h2>
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($p->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        @unless(empty($p->post_avatar))
        <div class="post-avatar">
          <img src="{{ $p->post_avatar }}" alt="" />
        </div>
        @endunless
        <div class="post-excerpt">{{ $p->post_excerpt }}</div>
      </div>

      @else

      <div class="post">
        <h2 class="post-title"><a href="javascript:void(0)">{{ $p->post_title }}</a></h2>
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($p->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        @unless(empty($p->post_avatar))
        <div class="post-avatar">
          <img src="{{ $p->post_avatar }}" alt="" />
        </div>
        @endunless
        <div class="post-excerpt">{{ $p->post_excerpt }}</div>
      </div>

      @endif
      @empty
      <p>Chưa có dữ liệu.</p>
      @endforelse
    </div>
  </div>
</div>

@stop
