{{-- Created at 2015/06/21 09:29 htien Exp $ --}}
@extends('layouts.admin.app')

@section('page_title', '[Không tiêu đề]')

{{-- Load resources --}}

@section('page_css')

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link rel="stylesheet" href="vendor/froala-editor/1.2.7/css/froala_editor.min.css" />
<link rel="stylesheet" href="vendor/froala-editor/1.2.7/css/froala_style.min.css" />
<link rel="stylesheet" href="css/admin.css" media="all" />

@stop

@section('page_js_preload')

<script src="vendor/tinymce/4.1.10/tinymce.min.js"></script>
<script src="vendor/froala-editor/1.2.7/js/froala_editor.min.js"></script>
<!--[if lt IE 9]><script src="vendor/froala-editor/1.2.7/js/froala_editor_ie8.min.js"></script><![endif]-->
<script src="vendor/froala-editor/1.2.7/js/plugins/char_counter.min.js"></script>
<script src="vendor/froala-editor/1.2.7/js/plugins/fullscreen.min.js"></script>
<script src="vendor/froala-editor/1.2.7/js/plugins/tables.min.js"></script>
<script src="js/base.js"></script>
<script src="js/admin.js"></script>

@stop

@section('page_js_load')

<script src="js/admin_load.js"></script>

@stop

{{-- Load content --}}

@section('main_content')

@yield('content_before')

@yield('content')

@yield('content_after')

@stop
