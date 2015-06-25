{{-- Created at 2015/06/01 04:10 htien Exp $ --}}
@extends('layouts.home.app')

@section('page_title', 'Trang Chủ')

{{-- Load resources --}}

@section('page_css')

<link rel="stylesheet" href="vendor/owl-carousel/1.3.3/owl.carousel.css" />
<link rel="stylesheet" href="vendor/owl-carousel/1.3.3/owl.theme.css" />
<link rel="stylesheet" href="css/home.css" media="all" />

@stop

@section('page_js_preload')

<script src="js/base.js"></script>
<script src="js/home.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64248666-1', 'auto');
  ga('send', 'pageview');

</script>

@stop

@section('page_js_load')

<script src="vendor/owl-carousel/1.3.3/owl.carousel.js"></script>
<script src="vendor/jquery-jcarousel/0.3.3/js/jquery.jcarousel.js"></script>
<script src="js/home_load.js"></script>

@stop

{{-- Load content --}}

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
