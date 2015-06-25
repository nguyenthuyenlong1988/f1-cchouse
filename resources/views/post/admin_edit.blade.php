{{-- Created at 2015/06/21 09:28 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('page_title', 'Sửa bài viết #' . $post->id)

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li><a href="{{ route('admin::@dmin-zone.posts.index') }}">Tin tức - Hoạt động</a></li>
  <li class="active">{ EDIT #{{ $post->id }} } - {{ $post->post_title }}</li>
</ol>

<div class="container">

  <div class="panel panel-primary">
    <div class="panel-heading">Bài viết #{{ $post->id }} &raquo; Đang chỉnh sửa...</div>
    <div class="panel-body">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Chú ý!</strong> Có một vài vấn đề trong việc nhập liệu.<br><br>
        <ul>
          @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      {!! Form::model($post, ['route' => ['admin::@dmin-zone.posts.update', $post->id], 'method' => 'PUT']) !!}
          @include('post._form', ['button_name' => 'Cập nhật'])
      {!! Form::close() !!}

    </div>
  </div>

</div>

@stop
