{{-- Created at 2015/06/21 09:27 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li><a href="{{ route('admin::@dmin-zone.posts.index') }}">Tin tức - Hoạt động</a></li>
  <li class="active">#{{ $post->id }} - {{ $post->post_title }}</li>
</ol>

<div class="container">

  <div class="panel panel-primary">
    <div class="panel-footer">
      <div class="btn-group" role="group">
        <a class="btn btn-warning" href="{{ route('admin::@dmin-zone.posts.index') }}">&lt;&lt;</a>
        <a class="btn btn-warning">Chỉnh sửa</a>
      </div>
      <div class="btn-group">
        <a class="btn btn-default" href="{{ route('admin::@dmin-zone.posts.create') }}">Bài viết mới</a>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li><a>Hủy bài viết</a></li>
        </ul>
      </div>
      <h2>{{ $post->post_title }}</h2>
    </div>
    <div class="panel-heading">Tóm tắt</div>
    <div class="panel-body">
      {{ $post->post_excerpt }}
    </div>
    <div class="panel-heading">Nội dung chi tiết</div>
    <div class="panel-body">
      {{ $post->post_content }}
    </div>
  </div>

</div>

@stop
