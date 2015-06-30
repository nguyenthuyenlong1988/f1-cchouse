{{-- Created at 2015/06/27 02:12 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', 'Tin tức Hoạt động')
@section('page_body_attributes')
id="actnews-index" class="actnews-page"
@stop

@section('page_css')
@parent

<link rel="stylesheet" href="css/actnews.css" media="all" />

@stop

@section('content')

<div class="container-fluid">
  @if (Request::input('error'))
  <div class="alert alert-danger">
    Không tìm thấy trang! Bạn vừa yêu cầu bài viết không tồn tại.
  </div>
  @endif

  <h1 class="page-header">
    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
    Tin tức &mdash; Hoạt động
  </h1>
  <div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-7">
      @forelse($actNews as $key => $p)
      <?php $author = $p->author()->select('id', 'name')->first();
            $postId = Hashids::encode($p->id); ?>
      @if ($key == 0) {{-- First post --}}

      <div class="post post-first">
        <h2 class="post-title">
          <a href="{{ route('actnews.show', $p->post_name . '-' . $postId) }}">{{ $p->post_title }}</a>
        </h2>
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($p->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        @unless(empty($p->post_avatar))
        <div class="post-avatar">
          <a href="{{ route('actnews.show', $p->post_name . '-' . $postId) }}">
            <img src="{{ $p->post_avatar }}" alt="" />
          </a>
        </div>
        @endunless
        <div class="post-excerpt">{{ $p->post_excerpt }}</div>
      </div>

      @else {{-- Continue posts --}}

      <div class="post">
        <h2 class="post-title">
          <a href="{{ route('actnews.show', $p->post_name . '-' . $postId) }}">{{ $p->post_title }}</a>
        </h2>
        <p class="post-info">
          <span class="post-date">{{ ivy_echo_date($p->post_date) }}</span>
          <span class="post-author">bởi {{ $author ? $author->name : 'Hệ thống' }}</span>
        </p>
        @unless(empty($p->post_avatar))
        <div class="post-avatar">
          <a href="{{ route('actnews.show', $p->post_name . '-' . $postId) }}">
            <img src="{{ $p->post_avatar }}" alt="" />
          </a>
        </div>
        @endunless
        <div class="post-excerpt">{{ $p->post_excerpt }}</div>
      </div>

      @endif
      @empty
      <p>Chưa có dữ liệu.</p>
      @endforelse
    </div>
    <div class="col-md-3">
      <div style="margin-bottom:10px;padding:10px;background-color:#fff;border:1px solid #e2e2e2;border-radius:2px">
        <h4>Slide hình</h4>
        <ul class="no-bullets">
          @for ($i = 0; $i < 12; $i++)
          <li>&nbsp;</li>
          @endfor
        </ul>
      </div>

      <div style="margin-bottom:10px;padding:10px;background-color:#c3d339;border:3px solid #c3d339;border-radius:2px">
        <h4>Phòng Chiếu Phim 3D</h4>
        @for ($i = 0; $i < 5; $i++)
        <br />
        @endfor
      </div>

      <div style="margin-bottom:10px;padding:10px;background-color:#f0f2b6;border:1px solid #c3d339;border-radius:2px">
        <h4>Đặt quảng cáo nhà tài trợ</h4>
        @for ($i = 0; $i < 5; $i++)
        <br />
        @endfor
      </div>
    </div>
  </div>
</div>

@stop
