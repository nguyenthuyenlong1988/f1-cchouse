{{-- Created at 2015/06/21 09:29 htien Exp $ --}}
@extends('layouts.admin.app')

@section('page_title', 'Quản Trị')

@section('page_css')

<link rel="stylesheet" href="css/admin.css" media="all" />

@stop

@section('page_js_preload')

<script src="js/main.js"></script>

@stop

@section('page_js_load')
@stop

@section('main_content')

@yield('content_before')

@yield('content')

@yield('content_after')

@stop
