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
    <div class="panel-heading">
      <span style="margin-right:10px">Bài viết #{{ $post->id }}</span>
      <div class="btn-group" role="group">
        <a class="btn btn-primary" href="{{ route('admin::@dmin-zone.posts.index') }}">&lt;&lt;</a>
        <a class="btn btn-primary" href="{{ route('admin::@dmin-zone.posts.edit', $post->id) }}">Chỉnh sửa</a>
      </div>
      <div class="btn-group">
        <a class="btn btn-primary" href="{{ route('admin::@dmin-zone.posts.create') }}">Bài viết mới</a>
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
          <li>
            <a href="javascript:void(0)" onclick="dlg_post_delete('{{ $post->id }}', '{{ $post->post_title }}', '{{ csrf_token() }}')" style="color:#c9302c">Hủy bài viết</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-9">
          <h2 style="margin-top:0">{{ $post->post_title }}</h2>
          <h5>
            <em>&mdash; Cập nhật lần cuối:</em> {{ ivy_echo_date($post->updated_at) }}
          </h5>
        </div>
        <div class="col-md-3">
          <h5><em>Ngày tạo:</em> {{ ivy_echo_date($post->created_at) }}</h5>
          <h5><em>Tác giả:</em> {{ empty($post->post_author) ? 'SYSTEM' : $post->author->name }}</h5>
        </div>
      </div>
    </div>
    <div class="panel-heading">Tóm tắt</div>
    <div class="panel-body">
      {{ $post->post_excerpt }}
    </div>
    <div class="panel-heading">Nội dung chi tiết</div>
    <div class="panel-body">
      {!! $post->post_content !!}
    </div>
  </div>

</div>

@stop
