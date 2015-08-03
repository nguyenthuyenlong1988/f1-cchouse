{{-- Created at 2015/05/27 03:44 htien Exp $ --}}
@extends('_layouts.home.main_page')
@section('page_title', 'Trang Chủ')
@section('page_body_attributes')
class="home-page"
@stop

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')

<link rel="stylesheet" href="assets/libs/owl-carousel/2.0.0/css/owl.carousel.css" />
@parent
<link rel="stylesheet" href="app-home/home.css" />
<style>
  #danhngon-box {
    padding: 10px;
    color: #fff;
    background: #24a7ad linear-gradient(to top, #2ecc71, #229e57);
    border-radius: 2px;
  }
</style>

@stop

@section('page_js_load')

<script src="assets/libs/jquery-jcarousel/0.3.3/js/jquery.jcarousel.min.js"></script>
<script src="assets/libs/owl-carousel/2.0.0/js/owl.carousel.js"></script>
@parent
<script src="app-home/home.js"></script>

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('content_before')

@include('_shared.home.activity_section')

@include('_shared.home.dreams_section')

{{--@include('_shared.home.featured_section')--}}

@stop

@section('content')

{{-- ROW --}}

<div class="cuztom-row">
  <div class="col-sm-6">

    {{-- Column Header --}}

    <h2 class="section-topline text-center visible-xs" style="margin-top: 40px;margin-bottom: 30px;padding-bottom: 15px;">
      <img class="hidden-xs" src="assets/img/florish-left.png" alt="" />Tin Tức Hoạt Động<img class="hidden-xs" src="assets/img/florish-right.png" alt="" />
    </h2>

    {{-- Activity News --}}

    <div class="actnews-list-content">
      <h2 class="box-title"><span>Tin tức Hoạt động</span></h2>
      @forelse ($articles as $key => $p)
        <?php $postUri = $p->term_slug . '/' . $p->post_name . '--' . Hashids::encode($p->id); ?>
        @if ($key == 0)  {{-- First post --}}

        <article class="actnews actnews-first clearfix">
          <header class="entry-header">
            <h3 class="entry-title">
              <a href="{{ route('article.index', $postUri) }}">
                <img src="{{ empty($p->post_avatar) ? 'assets/img/transparent.gif' : route('_image.index') . '/' . $p->post_avatar }}" alt="" />
                {{ $p->post_title }}
              </a>
            </h3>
          </header>
          <div class="entry-summary">
            {{ $p->post_excerpt }}
          </div>
        </article>

        @else  {{-- next posts --}}

        <article class="actnews clearfix">
          <div class="__divider-style-1"></div>
          <header class="entry-header">
            @if (empty($p->post_avatar))
              <div class="entry-thumbnail no-thumbnail">
                <img src="assets/img/transparent.gif" alt="" />
                <a href="{{ route('article.index', $postUri) }}"></a>
              </div>
            @else
              <div class="entry-thumbnail img-circle">
                <img src="{{ route('_image.index') . '/' . $p->post_avatar }}" alt="" />
                <a href="{{ route('article.index', $postUri) }}"></a>
              </div>
            @endif
            <h3 class="entry-title">
              <a href="{{ route('article.index', $postUri) }}">{{ $p->post_title }}</a>
            </h3>
          </header>
          <div class="entry-summary">
            {{ $p->post_excerpt }}
          </div>
        </article>

        @endif
      @empty
        <div class="clearfix" style="margin-top:5px;padding:10px;background-color:#fff;border:2px dashed #84cdc7">
          <h3 style="margin-top:0">Chưa có tin tức.</h3>
          <img src="assets/img/demo/100x100_thumbnail_1.jpg" alt="" style="float:left;margin-right:7px" />
          Hãy cập nhật thêm bài viết trong hệ thống quản lý!
        </div>
      @endforelse

      {{--<div class="__divider-style-1"></div>--}}
      {{--<div class="headline-template">--}}
        {{--<div>--}}
          {{--<ul class="col">--}}
            {{--@for ($i = 0; $i < 4; $i++)--}}
              {{--<li class="headlines">--}}
                {{--<a href="javascript:void(0)">--}}
                  {{--<img src="assets/img/transparent.gif" alt="" />--}}
                  {{--<h4>Tạp chí Mỹ tiết lộ lý do ông Putin được yêu mến ở Nga Tàu Khựa</h4>--}}
                  {{--<span class="sourcename">Nhà Thiếu Nhi</span>--}}
                {{--</a>--}}
              {{--</li>--}}
            {{--@endfor--}}
          {{--</ul>--}}
        {{--</div>--}}
      {{--</div>--}}

    </div>

  </div>
  <div class="sidebar col-sm-3">

    {{-- Danh Ngôn --}}

    <div id="danhngon-box" class="box box-style-1">
      <h4 class="box-title text-center">
        <img src="assets/img/florish-left.png" alt="" width="45" />
        <span>Câu nói hay</span>
        <img src="assets/img/florish-right.png" alt="" width="45" /><br />
        <span>Mỗi ngày một danh ngôn</span>
      </h4>
      <p class="text-center" style="font-size: 120%;">Rễ của sự học tập thì đắng, quả của sự học tập thì ngọt.</p>
      <p class="text-center">&mdash; Ngạn ngữ Nga &mdash;</p>
      <p class="text-center"><a class="peekaboo3-btn" href="{{ route('page', 'gioi-thieu') }}">Xem tiếp <span class="fa fa-plus-circle" aria-hidden="true"></span></a></p>
    </div>

    {{-- HCM --}}

    <div class="box text-center hidden-xs">
      <img src="assets/img/hcm.jpg" alt="" style="width: 100%;" />
    </div>

    {{-- Văn bản Nhà Thiếu Nhi --}}

    <div id="doc-widget" class="box widget">
      <h4 class="box-title"><span>Văn bản Nhà thiếu nhi</span></h4>
      <ul>
        <li class="item">
          <a href="media/files/Lich_Hoc_20150106.docx">
            <div class="__container">
              <img class="thumb" src="assets/img/photos/event/aside_bg_1.jpg" alt="" />
              <div class="title-container"><span>Thông tin lịch học</span></div>
            </div>
          </a>
        </li>
        <li class="item">
          <a href="javascript:void(0)">
            <div class="__container">
              <img class="no-thumb" src="assets/img/transparent.gif" alt="" />
              <div class="title-container"><span>Văn bản số 2</span></div>
            </div>
          </a>
        </li>
        <li class="item">
          <a href="javascript:void(0)">
            <div class="__container">
              <img class="no-thumb" src="assets/img/transparent.gif" alt="" />
              <div class="title-container"><span>Văn bản số 3</span></div>
            </div>
          </a>
        </li>
      </ul>
    </div>

  </div>
  <div class="sidebar col-sm-3">

    {{-- Activity Pictures (vertical slider) --}}

    @include('_shared.home.actpics')

    {{-- Film 3D --}}

    @include('_shared.home.film3d')

    {{-- Advertises --}}

    @include('_shared.home.ads')

  </div>
</div>
@stop

@section('content_after')

<section id="addition-section" class="ivy-section">
  <div class="__bg__overlay"></div>
  <div class="ivy-page-wrapper">
    <div id="addition-wrapper">
      <div class="cuztom-row">
        <div class="box col-xs-12 col-md-3">
          <h4 class="box-title"><span>Chuyên mục</span></h4>
          <ul class="no-bullets with-arrow">
            <li><a href="javascript:void(0)">Donec ut vestibulum nunc</a></li>
            <li><a href="javascript:void(0)">Ut malesuada suscipit augue accumsan rutrum</a></li>
            <li><a href="javascript:void(0)">Suspendisse non est ut augue dapibus pulvinar</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-6">
          <h4 class="box-title"><span>Tiêu điểm</span></h4>
        </div>
        <div class="box col-xs-12 col-md-3">
          <h4 class="box-title"><span>Chat trực tuyến</span></h4>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="newsletter-area" class="ivy-section footerwidget-section">
  <div class="ivy-page-wrapper">
    <div class="inner-area clearfix">
      <div id="newsletter-wrapper" class="widget-wrapper col-md-6">
        <div id="newsletter-widget" class="widget">
          <h2 class="title"><span>Đăng ký bản tin</span></h2>
          <div class="widget-content">
            <br />
            <div class="text-center">
              <img src="assets/img/demo/sketch-subscribe.png" alt="" />
            </div>
            <br />
            <div id="btnEmailsub">
              <form id="subscribe" action="./" method="post">
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                  <input id="subbox" class="form-control" type="text" placeholder="Nhập email của bạn..." />
                  <span class="input-group-btn">
                    <button id="subbutton" class="btn btn-info" type="button">
                      <span class="hidden-xs">Đăng ký nhận tin</span> <span class="glyphicon glyphicon-ok"></span>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="facebook-wrapper" class="widget-wrapper col-md-6 hidden-xs">
        <div id="facebook-widget" class="widget">
          <h2 class="title"><span>Theo dõi trên Facebook</span></h2>
          <div class="widget-content text-center">
            @include('_shared.common.facebook_fanpage')
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@stop
