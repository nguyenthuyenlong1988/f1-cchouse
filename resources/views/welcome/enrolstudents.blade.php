{{-- Created at 2015/07/01 22:18 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', 'Chiêu Sinh')
@section('page_body_attributes')
id="enrolstudents-page"
@stop

@section('page_css')
@parent

<style>
  #enrolstudents-page #detail-section,
  #enrolstudents-page #navbar a.navbar-brand.active,
  #enrolstudents-page #navbar ul.navbar-nav > li.active > a {
    background-color: #eab645; /*e85656*/
  }

  #enrolstudents-page #navbar a.navbar-brand.active,
  #enrolstudents-page #navbar ul.navbar-nav > li.active > a {
    color: #fff;
  }

  #enrolstudents-page .content p.level-1 {
    text-indent: 50px;
  }

  #enrolstudents-page .content p.level-2 {
    text-indent: 80px;
  }

  #enrolstudents-page .content h3 {
    text-transform: uppercase;
  }

  #enrolstudents-page .content h3 strong {
    font-weight: 400;
  }

  .pg-source {
    margin-top: 30px;
    font-weight: bold;
    text-align: right;
  }
</style>

@stop

@section('content')

<div class="container-fluid">

  <h1 class="page-header"><span class="glyphicon glyphicon-info-sign"></span> Chiêu Sinh</h1>
  <div class="content">
  	<h2 class="page-heading"><span class="glyphicon glyphicon-bullhorn"></span><br />Thông báo Chiêu sinh<br /><small>Các lớp năng khiếu hè năm 2015</small></h2>

    <p>
      <strong>Nhằm tổ chức các sân chơi, hoạt động văn hóa, văn nghệ, thể thao lành mạnh và ý nghĩa,
        góp phần phát hiện và bồi dưỡng năng khiếu dành cho thiếu nhi,
        đặc biệt khi các em nghỉ hè; Nhà Thiếu Nhi Gò Vấp thông báo mở các lớp và bộ môn đào tạo trong dịp hè cụ thể như sau:</strong>
    </p>

    <h3><span class="glyphicon glyphicon-list-alt"></span> <strong>1. Các bộ môn</strong></h3><hr />

    <h4>1.1. Bộ môn nghệ thuật:</h4>

    <p class="level-1">Các bộ môn múa (múa Bale, múa dân gian, múa hiện đại, múa bụng…), Thanh nhạc, Nhảy hiện đại, Đàn organ,
    Khiêu vũ giao tiếp…</p>

    <div class="pg-image pg-image-one">
      <img src="img/chieu-sinh/chieu-sinh-03.jpg" alt="Nhà thiếu nhi gò vấp chiêu sinh các lớp năng khiếu" width="960" />
    </div>

    <h4>1.2. Bộ môn thể thao: </h4>

    <p class="level-1">Các bộ môn cờ (cờ tướng, cờ vua, cờ vây) Khiêu vũ thể thao, Thể dục nhịp điệu, Bơi, Bóng đá, Bóng rổ,
    Võ thuật (võ Thiếu Lâm, Vovinam, Akido, Taekwondo, Vịnh Xuân Quyền)…</p>

    <div class="pg-image pg-image-one">
      <img src="img/chieu-sinh/chieu-sinh-01.jpg" alt="Nhà thiếu nhi gò vấp chiêu sinh các lớp năng khiếu" width="960" />
    </div>

    <h4>1.3. Bộ môn Sáng tạo kỹ thuật: </h4>

    <p class="level-1">Hội họa, Rèn chữ, Anh văn, Kỹ năng sống thực hành xã hội,  Ảo thuật, Tạo hình đất sét,
    Tạo hình bong bóng…</p>

    <h4>1.4. Các hoạt động trải nghiệm: </h4>

    <p class="level-1">Các chương trình “Đại sứ du lịch”, “Một ngày làm nhà nông”, Liên hoan ca múa nhạc toàn thành,
    Búp Sen Hồng, trại hè thiếu nhi...</p>

    <div class="pg-image pg-image-one">
      <img src="img/chieu-sinh/chieu-sinh-02.jpg" alt="Nhà thiếu nhi gò vấp chiêu sinh các lớp năng khiếu" width="960" />
    </div>

    <h3><span class="glyphicon glyphicon-list-alt"></span> <strong>2. Hình thức đào tạo</strong></h3><hr />

    <p class="level-1">Các bộ môn có chương trình giảng dạy ở các cấp độ khác nhau;
    và tuyển sinh liên tục hoặc đào tạo theo nhu cầu của các trường dành cho từng đối tượng.</p>

    <h3><span class="glyphicon glyphicon-list-alt"></span> <strong>3. Đội ngũ giảng viên</strong></h3><hr />

    <p class="level-1">Là những giáo viên được đào tạo chuyên sâu về các bộ môn; có kỹ năng, trình độ và nghiệp vụ sư phạm.</p>

    <h3><span class="glyphicon glyphicon-list-alt"></span> <strong>4. Thời gian</strong></h3><hr />

    <h4>4.1. Thời gian học: </h4>

    <p class="level-1">3 tháng từ 1/6 – cuối tháng 8/2015</p>

    <h4>4.2. Lịch học: </h4>

    <p class="level-1">Học 1 tuần 2 buổi hoặc 3 buổi Thứ Bảy và Chủ Nhật hoặc 3 buổi,
    mỗi buổi từ 1 – 1,5 - 2 giờ (theo từng bộ môn, vui lòng xem lịch học tại Phòng Ghi Danh).</p>

    <h4>4.3. Lịch khai giảng: </h4>

    <p class="level-1">Ngày 01/06/2015 (Chủ Nhật)</p>

    <h3><span class="glyphicon glyphicon-list-alt"></span> <strong>5. Địa điểm</strong></h3><hr />
    <p class="level-1">Tại Nhà Thiếu Nhi Gò Vấp - 450/19C, Lê Đức Thọ, Phường 16, Quận Gò Vấp</p>

    <h3><span class="glyphicon glyphicon-list-alt"></span> <strong>6. Thủ tục và kinh phí đào tạo</strong></h3><hr />

    <p class="level-1">+ Đăng ký học qua các kênh:</p>
    <p class="level-2">- Đăng ký trực tiếp tại Phòng Ghi Danh - Nhà Thiếu Nhi Gò Vấp (Hotline: 08.39163089)</p>
    <p class="level-2">- Hoặc đăng ký trực tuyến tại website: www.NhaThieuNhiGoVap.com</p>
    <p class="level-1">+ Học phí được đóng theo tháng, theo từng bộ môn.</p>
    <p class="level-1">+ Giảm học phí khi đăng ký sớm hoặc đóng nguyên khóa.</p>

    <br />
    <div>
      <p>Để biết thêm thông tin chi tiết về các lớp học xin vui lòng liên hệ với (chị) <strong>Mộng Thường</strong>.</p>
      <p><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> <strong>Điện thoại</strong>: 08.39163089</p>
      <p><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <strong>Website</strong>: www.NhaThieuNhiGoVap.com</p>
    </div>

    <p class="pg-source">Ban Quản Trị (NTNGV).</p>
  </div>

</div>

@stop
