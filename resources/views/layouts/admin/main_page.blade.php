{{-- Created at 2015/06/21 09:29 htien Exp $ --}}
@extends('layouts.admin.app')

@section('page_title', '[Không tiêu đề]')

{{-- Load resources --}}

@section('page_css')

<link rel="stylesheet" href="assets/admin/base.css" media="all" />

@stop

@section('page_js_preload')

<script src="assets/js/base_c.js"></script>
<script src="assets/admin/base_c.js"></script>

@stop

@section('page_js_load')

<script src="assets/js/base.js"></script>
<script src="assets/admin/base.js"></script>
<script src="app-admin/app.js"></script>
<script src="assets/admin/bootstrap.js"></script>

@stop

{{-- Load content --}}

@section('main_content')

@yield('content_before')

@yield('content')

@yield('content_after')

@stop
