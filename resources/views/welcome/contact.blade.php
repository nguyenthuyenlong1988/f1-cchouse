{{-- Created at 2015/06/30 22:41 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', 'Liên Hệ')
@section('page_body_attributes')
id="contact-page"
@stop

@section('page_css')
@parent

<style>
  /* Tạm thời cập nhật CSS tĩnh tại đây */
</style>

@stop

@section('content')

<div class="container-fluid">

  {{-- Cập nhật nội dung giới thiệu tại đây! --}}
  <h1 class="page-header">
  	NHÀ THIẾU NHI QUẬN GÒ VẤP<br />
  	BỘ PHẬN GIÁO VỤ VÀ ĐÀO TẠO
  </h1>
  
  <p>
  	<strong>Địa Chỉ:</strong> Số 27,Đường số 9, Phường 16, Quận Gò Vấp &mdash;
  	<strong><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Điện thoại:</strong> 08.39163089 <br />
  	<strong>Facebook:</strong> Nhà Thiếu nhi Gò Vấp &mdash;
  	<strong><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Website:</strong> www.nhathieunhigovap.com
  </p>
  
  <p>
  	<img alt="lien-he-nha-thieu-nhi-go-vap" src="img/lien-he/lien-he-01.jpg" />
  </p>

</div>

@stop
