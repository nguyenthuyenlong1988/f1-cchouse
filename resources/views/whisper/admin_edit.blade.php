{{-- Created at 2015/06/21 09:28 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('page_title', 'Sửa tâm sự #' . $post->id)

{{-- Load resources --}}

@section('page_css')

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link rel="stylesheet" href="assets/libs/froala-editor/1.2.7/css/froala_editor.min.css" />
<link rel="stylesheet" href="assets/libs/froala-editor/1.2.7/css/froala_style.min.css" />
@parent

@stop

@section('page_js_load')

<script src="assets/libs/froala-editor/1.2.7/js/froala_editor.min.js"></script>
<!--[if lt IE 9]><script src="assets/libs/froala-editor/1.2.7/js/froala_editor_ie8.min.js"></script><![endif]-->
<script src="assets/libs/froala-editor/1.2.7/js/plugins/char_counter.min.js"></script>
<script src="assets/libs/froala-editor/1.2.7/js/plugins/fullscreen.min.js"></script>
<script src="assets/libs/froala-editor/1.2.7/js/plugins/tables.min.js"></script>
@parent
<script src="app-admin/postedit.js"></script>

@stop

{{-- Load content --}}

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li><a href="{{ route('admin::@dmin-zone.whisper.index') }}">Góc tâm sự</a></li>
  <li class="active">{ EDIT #{{ $post->id }} } - {{ $post->post_title }}</li>
</ol>

<div class="container">

  <div class="panel panel-primary">
    <div class="panel-heading">Tâm sự #{{ $post->id }} &raquo; Đang chỉnh sửa...</div>
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

      {!! Form::model($post, ['route' => ['admin::@dmin-zone.whisper.update', $post->id], 'method' => 'PUT']) !!}
          @include('whisper._form', ['button_name' => 'Cập nhật'])
      {!! Form::close() !!}

    </div>
  </div>

</div>

@stop
