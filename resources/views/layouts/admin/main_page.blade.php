{{-- Created at 2015/06/21 09:29 htien Exp $ --}}
@extends('layouts.admin.app')

@section('page_title', 'Quản Trị')

@section('page_css')

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
<link rel="stylesheet" href="vendor/summernote/0.6.7/css/summernote.min.css" />
<link rel="stylesheet" href="css/admin.css" media="all" />

@stop

@section('page_js_preload')

<script src="vendor/summernote/0.6.7/js/summernote.min.js"></script>
<script src="vendor/tinymce/4.1.10/tinymce.min.js"></script>
<script src="js/base.js"></script>
<script src="js/admin.js"></script>

@stop

@section('page_js_load')

<script src="js/admin_load.js"></script>

@stop

@section('main_content')

@yield('content_before')

@yield('content')

@yield('content_after')

@stop
