{{-- Created at 2015/06/30 22:41 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', 'Liên Hệ')
@section('page_body_attributes')
id="contact-page" class="contact-page"
@stop

{{-- ======================================================= LOAD RESOURCES --}}

@section('page_css')
@parent

<link rel="stylesheet" href="app-home/contact.css" />

@stop

{{-- ========================================================= LOAD CONTENT --}}

@section('content')

<div class="container-fluid">

  <h1 class="page-header"><span class="glyphicon glyphicon-envelope"></span> Liên Hệ</h1>
  <h2 class="page-heading">Bộ phận Giáo vụ & Đào Tạo<br /><small>Nhà Thiếu Nhi Q.Gò Vấp</small></h2>
  <p class="text-center">
  	<strong><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Địa Chỉ</strong>: Số 27, Đường số 9, Phường 16, Quận Gò Vấp, TP.HCM
  	<a href="https://www.google.com/maps/place/Nh%C3%A0+Thi%E1%BA%BFu+Nhi+G%C3%B2+V%E1%BA%A5p/@10.8434307,106.6689625,17z/data=!4m2!3m1!1s0x0000000000000000:0xd8ed5f922d17dbd3" target="_blank">
  	  <span class="glyphicon glyphicon-link"></span>
  	</a>
  </p>
  <p class="text-center">
  	<strong><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Điện thoại</strong>: 08.39163089
  </p>
  <p class="text-center">
  	<strong><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Facebook</strong>: Nhà Thiếu nhi Gò Vấp
  	<a href="https://www.facebook.com/nhathieunhigovap2004" target="_blank"><span class="glyphicon glyphicon-link"></span></a>
  </p>
  <p class="text-center">
  	<strong><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Website</strong>: www.NhaThieuNhiGoVap.com
  </p>
  <hr />
  <h2 class="page-heading">Bản đồ</h2>

  <div>

    <ul class="nav nav-pills" role="tablist">
      <li role="presentation" class="active"><a href="#google-maps" aria-controls="google-maps" role="tab" data-toggle="pill">Bản đồ Google</a></li>
      <li role="presentation"><a href="#simple-map" aria-controls="simple-map" role="tab" data-toggle="pill">Bản đồ đơn giản</a></li>
    </ul>

    <div class="tab-content">
      <div id="google-maps" class="tab-pane fade in active" role="tabpanel">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5798417862347!2d106.66896246290146!3d10.843430748475761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xd8ed5f922d17dbd3!2zTmjDoCBUaGnhur91IE5oaSBHw7IgVuG6pXA!5e0!3m2!1sen!2s!4v1435775814029" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
      <div id="simple-map" class="tab-pane fade" role="tabpanel">
        <img src="media/p_lienhe/lien-he-01.jpg" alt="" />
      </div>
    </div>

  </div>

</div>

@stop
