{{-- Created at 2015/05/27 03:44 htien Exp $ --}}
@extends('layouts.home.main_page')
@section('page_title', 'Trang Chủ')
@section('page_body_attributes')
class="home-page"
@stop

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')

<link rel="stylesheet" href="assets/libs/owl-carousel/2.0.0/css/owl.carousel.css" />
@parent
<link rel="stylesheet" href="app-home/home.css" />

@stop

@section('page_js_load')

<script src="assets/libs/owl-carousel/2.0.0/js/owl.carousel.js"></script>
@parent
<script src="app-home/home.js"></script>

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('content_before')

@include('partials.home.activity_section')

@include('partials.home.dreams_section')

{{--@include('partials.home.featured_section')--}}

@stop

@section('content')

<div class="cuztom-row">
  <div class="sidebar col-sm-3">
    <div style="margin-bottom:30px;padding:10px;color:#fff;background-color:#1b837b;border:0 solid #1b837b;border-radius:2px;
      background-image:linear-gradient(to top, #14814c, #49b860);">
      <h4 class="box-title">
        <img src="assets/img/florish-left.png" alt="" width="45" />
        <strong>Giới Thiệu</strong>
        <img src="assets/img/florish-right.png" alt="" width="45" /><br />
        <strong>Nhà Thiếu Nhi Gò Vấp</strong>
      </h4>
      <p>
        Năm 2010, Nhà thiếu nhi Quận Gò Vấp được tặng Cờ thi đua dẫn đầu Cụm của Thành phố,
        và Bằng khen của Trung ương Đoàn. Có được sự ghi nhận đó là do Đơn vị đã tổ chức nhiều hoạt động phong phú,
        đa dạng đáp ứng nhu cầu vui chơi hồn nhiên củathanh thiếu niên trong quận.
        <a class="peekaboo3-btn" href="{{ route('intro') }}">Xem tiếp <span class="fa fa-plus-circle" aria-hidden="true"></span></a>
      </p>
    </div>

    <div style="margin-bottom: 30px;">
      <h4 class="box-title">Học tập và làm theo tấm gương đạo đức Hồ Chí Minh</h4>
      <img src="assets/img/demo/hcm.jpg" alt="" />
    </div>

    <div style="margin-bottom:10px;padding:10px;background-color:#f3d3f4;border:0 solid #eaaeae;border-radius:2px">
      <h4 class="box-title">Hỗ Trợ Trực Tuyến</h4>
    </div>
  </div>
  <div class="col-sm-6">
    <h2 class="box-title">
      <img src="assets/img/florish-left.png" alt="" />
      Tin Tức Hoạt Động
      <img src="assets/img/florish-right.png" alt="" />
    </h2>
    <div class="actnews-list-content">
      @forelse ($actNews as $key => $p)
      <?php $postUri = $p->post_name . '-' . Hashids::encode($p->id); ?>
      @if ($key == 0)  {{-- First post --}}

      <article class="actnews actnews-first clearfix">
        <header class="entry-header">
          <h3 class="entry-title">
            <a href="{{ route('actnews.show', $postUri) }}">{{ $p->post_title }}</a>
          </h3>
          <a href="{{ route('actnews.show', $postUri) }}" style="display: block;margin-bottom: 8px;text-align: center">
            <img src="{{ empty($p->post_avatar) ? 'assets/img/transparent.gif' : route('_image.index') . '/' . $p->post_avatar }}" alt="" />
          </a>
        </header>
        <div class="entry-summary">
          {{ $p->post_excerpt }}
        </div>
      </article>

      @else  {{-- next posts --}}

      <article class="actnews clearfix">
        <header class="entry-header">
          @if (empty($p->post_avatar))
          <div class="entry-thumbnail no-thumbnail">
            <img src="assets/img/transparent.gif" alt="" />
            <a href="{{ route('actnews.show', $postUri) }}"></a>
          </div>
          @else
          <div class="entry-thumbnail">
            <img src="{{ route('_image.index') . '/' . $p->post_avatar }}" alt="" />
            <a href="{{ route('actnews.show', $postUri) }}"></a>
          </div>
          @endif
          <h3 class="entry-title">
            <a href="{{ route('actnews.show', $postUri) }}">{{ $p->post_title }}</a>
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
    </div>
  </div>
  <div class="sidebar col-sm-3">
    <div style="margin-bottom:20px;padding:10px;background-color:#fff;border:1px solid #e2e2e2;border-radius:2px">
      <h4 class="box-title">Slide hình</h4>
      <ul class="no-bullets">
        @for ($i = 0; $i < 12; $i++)
        <li>&nbsp;</li>
        @endfor
      </ul>
    </div>

    <div style="margin-bottom:20px;padding:10px;background-color:#d4dbd8;border-radius:2px">
      <h4 class="box-title">Phòng Chiếu Phim 3D</h4>
      @for ($i = 0; $i < 5; $i++)
      <br />
      @endfor
    </div>

    <div style="margin-bottom:20px;padding:10px;background-color:#d4dbd8;border-radius:2px">
      <h4 class="box-title">Quảng cáo</h4>
      @for ($i = 0; $i < 5; $i++)
      <br />
      @endfor
    </div>
  </div>
</div>
@stop

@section('content_after')

<section id="addition-section">
  <div class="ivy-page-wrapper">
    <div id="addition-wrapper">
      <div class="cuztom-row">
        <div class="box col-xs-12 col-md-3">
          <h4 class="box-title">Văn Nghệ Thiếu Nhi</h4>
          <ul class="no-bullets with-arrow">
            <li><a href="javascript:void(0)">Donec ut vestibulum nunc</a></li>
            <li><a href="javascript:void(0)">Ut malesuada suscipit augue accumsan rutrum</a></li>
            <li><a href="javascript:void(0)">Suspendisse non est ut augue dapibus pulvinar</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-6 text-center">
          <div class="fb-page hidden-xs" data-href="https://www.facebook.com/nhathieunhigovap2004" data-width="450" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
            <div class="fb-xfbml-parse-ignore"></div>
          </div>
        </div>
        <div class="box col-xs-12 col-md-3">
          <h4 class="box-title">Liên Hệ</h4>
          <a href="{{ route('contact') }}"><img src="media/p_lienhe/lien-he-01.jpg" alt="" /></a>
        </div>
      </div>
    </div>
  </div>
</section>

@stop
