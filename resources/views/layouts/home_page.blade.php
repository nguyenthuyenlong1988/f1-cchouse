{{-- Created at 2015/06/01 04:10 htien Exp $ --}}
@extends('layouts.app')

@section('page_title', 'Trang Chủ')

@section('page_css')

<link rel="stylesheet" href="vendor/owl-carousel/1.3.3/owl.carousel.css" />
<link rel="stylesheet" href="vendor/owl-carousel/1.3.3/owl.theme.css" />
<link rel="stylesheet" href="css/home.css" media="all" />

@stop

@section('page_js_preload')

<script src="js/main.js"></script>

@stop

@section('page_js_load')

<script src="vendor/owl-carousel/1.3.3/owl.carousel.js"></script>
<script src="vendor/jquery-jcarousel/0.3.3/js/jquery.jcarousel.js"></script>
<script src="js/final.js"></script>

@stop

@section('main_content')

@yield('content_before')

<section id="detail-section" class="ivy-section">
  <div class="ivy-page-wrapper">
    <div id="detail-wrapper">

      @yield('content')

    </div>

    @yield('detail_after')

  </div>
</section>

@yield('content_after')

@stop