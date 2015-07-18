{{-- Created at 2015/06/21 09:26 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('page_title', 'Tâm sự mới')

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
<script src="app-admin/postcreate.js"></script>

@stop

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li><a href="{{ route('admin::@dmin-zone.whisper.index') }}">Góc tâm sự</a></li>
  <li class="active">Tâm sự mới</li>
</ol>

<div class="container">

  <div class="panel panel-primary">
    <div class="panel-heading">Góc tâm sự &raquo; Tạo tâm sự mới</div>
    <div class="panel-body">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Chú ý!</strong> Có một vài vấn đề trong việc nhập liệu.<br><br>
        <ul>
          @foreach ($errors->all() as $err)<li>{{ $err }}</li>@endforeach
        </ul>
      </div>
      @endif

      {!! Form::open(['route' => ['admin::@dmin-zone.whisper.store'], 'method' => 'POST', 'onsubmit' => 'func.setFormSubmitting()']) !!}
          @include('whisper._form', ['button_name' => 'Tạo mới'])
      {!! Form::close() !!}

    </div>
  </div>

</div>

@stop
