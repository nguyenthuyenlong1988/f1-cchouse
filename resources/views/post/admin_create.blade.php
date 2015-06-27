{{-- Created at 2015/06/21 09:26 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('page_title', 'Bài viết mới')

@section('page_js_load')
  @parent
  <script>_func.cfmOnClose()</script>
@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li><a href="{{ route('admin::@dmin-zone.posts.index') }}">Tin tức - Hoạt động</a></li>
  <li class="active">Bài viết mới</li>
</ol>

<div class="container">

  <div class="panel panel-primary">
    <div class="panel-heading">Tin tức - Hoạt động &raquo; Tạo bài viết mới</div>
    <div class="panel-body">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Chú ý!</strong> Có một vài vấn đề trong việc nhập liệu.<br><br>
        <ul>
          @foreach ($errors->all() as $err)<li>{{ $err }}</li>@endforeach
        </ul>
      </div>
      @endif

      {!! Form::open(['route' => ['admin::@dmin-zone.posts.store'], 'method' => 'POST', 'onsubmit' => 'func.setFormSubmitting()']) !!}
          @include('post._form', ['button_name' => 'Tạo mới'])
      {!! Form::close() !!}

    </div>
  </div>

</div>

@stop
