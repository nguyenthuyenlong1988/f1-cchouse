{{-- Created at 2015/06/01 04:10 htien Exp $ --}}
@extends('layouts.home.app')

@section('page_title', '[Không tiêu đề]')

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')

<link rel="stylesheet" href="app-home/base.css" media="all" />

@stop

@section('page_js_preload')

<script src="assets/js/base_c.js"></script>
<script src="app-home/base_c.js"></script>
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

<script src="assets/js/base.js"></script>
<script src="app-home/base.js"></script>

@stop

{{-- ========================================================= LOAD CONTENT --}}

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
