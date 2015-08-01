{{-- Created at 2015/07/30 11:57 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', 'Tin tức Hoạt động')
@section('page_body_attributes')
id="actnews-index" class="actnews-page"
@stop

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')

@parent
<link rel="stylesheet" href="app-home/actnews.css" media="all" />

@stop

@section('page_js_load')

<script src="assets/libs/jquery-jcarousel/0.3.3/js/jquery.jcarousel.min.js"></script>
@parent
<script src="app-home/actnews.js"></script>

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('content')

  <div class="container-fluid">
  </div>

@stop
