{{-- Created at 2015/06/21 09:29 htien Exp $ --}}
@extends('_layouts.admin.app')

@section('page_title', '[Không tiêu đề]')

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')

<link rel="stylesheet" href="app-admin/base.css" media="all" />

@stop

@section('page_js_preload')

<script src="assets/js/base_c.js"></script>
<script src="app-admin/base_c.js"></script>

@stop

@section('page_js_load')

<script src="assets/js/base.js"></script>
<script src="app-admin/base.js"></script>
<script src="app-admin/app.js"></script>
<script src="app-admin/bootstrap.js"></script>

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('main_content')

@yield('content_before')

@yield('content')

@yield('content_after')

@stop
