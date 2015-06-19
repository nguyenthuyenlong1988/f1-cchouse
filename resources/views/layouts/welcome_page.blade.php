{{-- Created at 2015/06/01 04:21 htien Exp $ --}}
@extends('layouts.home_page')

@section('page_title', 'Khai Trương')

@section('page_css')
@parent

<link rel="stylesheet" href="css/welcome.css" media="all" />

@stop

@section('content_after')

@include('partials.dreams_section')

@stop

@section('content')

<div class="container-fluid">

  <div id="children-intl-1" class="text-center">
    <img src="img/2015-06-01/mung-ngay-quoc-te-thieu-nhi.jpg" alt="" />
  </div>

  <div id="children-intl-2" role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#_evt_ngayhoituoitho" aria-controls="_evt_ngayhoituoitho" role="tab" data-toggle="tab">Ngày Hội Tuổi Thơ - 2015</a></li>
      <li role="presentation"><a href="#_hoatdongboich" aria-controls="_hoatdongboich" role="tab" data-toggle="tab">Hoạt động bổ ích</a></li>
      <li role="presentation"><a href="#_lophocnangkhieu" aria-controls="_lophocnangkhieu" role="tab" data-toggle="tab">Lớp học năng khiếu - 2015</a></li>
      <li role="presentation"><a href="#_hinhanh" aria-controls="_hinhanh" role="tab" data-toggle="tab">Hình ảnh</a></li>
      <li role="presentation"><a href="#_lichhoc" aria-controls="_lichhoc" role="tab" data-toggle="tab">Lịch học</a></li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="_evt_ngayhoituoitho">
        <div class="text-center">
          <img src="img/2015-06-01/ngay-hoi-tuoi-tho-2015.jpg" alt="" />
          <h2><strong>NGÀY HỘI TUỔI THƠ</strong></h2>
          <h3><strong>CHÀO MỪNG QUỐC TẾ THIẾU NHI 1/6/2015</strong></h3>
        </div>
        <div style="margin:20px auto;max-width:500px">
          <ul style="list-style:disc inside">
            <li><strong>Thời gian:</strong> Ngày 31/05 và 1/6 (Từ 8g00 đến 21g00)</li>
            <li><strong>Địa điểm:</strong> Nhà Thiếu nhi quận Gò Vấp<br />(Số 27 Đường số 9 F16 Quận Gò Vấp - Nhà Thiếu Nhi Gò Vấp)</li>
            <li><strong>Liên hệ:</strong> 08.39163089 (Phòng Giáo Vụ và Đào tạo)</li>
          </ul>
          <h4><strong>Tóm tắt nội dung chương trình</strong></h4>
          <ol style="list-style:decimal inside">
            <li>Sân chơi thiếu nhi - Sân chơi dân gian.</li>
            <li>Sân chơi nghệ thuật.</li>
            <li>Gian hàng ẩm thực.</li>
            <li>Chương trình lễ phát động phong trào "Tuổi nhỏ làm việc nhỏ, dựng xây Thành phố anh hùng".</li>
            <li>Chương trình biểu diễn văn nghệ phục vụ.
              <ul style="margin-left: 20px;list-style: square inside">
                <li>Các tiết mục ca múa nhạc, múa bụng, nhảy hiện đại phục vụ các em thiếu nhi nhân dịp lễ Quốc tế thiếu nhi 1/6.</li>
                <li>Với sự tham gia của các đội nhóm : CLB Ca múa nhạc kịch Si Si, CLB Nhảy hiện đại Đòn Bẩy, CLB Ca nhạc Hoa mặt trời.</li>
              </ul>
            </li>
            <li>Góc tư vấn lớp học năng khiếu thiếu nhi.</li>
            <li>Thư viện di động : Phục vụ đọc sách , truyện miễn phí cho các em thiếu nhi, phục vụ các trò chơi giải trí như: Tô tượng, tranh cát.</li>
            <li>Hội thi vẽ tranh với chủ đề: " Thành Phố Bác Hồ 40 mùa hoa nở".</li>
            <li>Chương trình chiếu phim phục vụ miễn phí.</li>
            <li>Xe mô hình điều khiển từ xa, chạy trên xa bàn</li>
            <li>Máy bay mô hình vượt chướng ngại vật</li>
            <li>Hội thi nhiếp ảnh: "Nét ảnh trong mắt trẻ thơ".</li>
            <li>Chương trình tư vấn, chăm sóc sức khỏe cho thiếu nhi.</li>
          </ol>
          <p><strong>BTC chương trình.</strong></p>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="_hoatdongboich">
        <img src="img/2015-06-01/brochure-01.jpg" alt="" />
      </div>
      <div role="tabpanel" class="tab-pane" id="_lophocnangkhieu">
        <img src="img/2015-06-01/brochure-02.jpg" alt="" />
      </div>
      <div role="tabpanel" class="tab-pane" id="_hinhanh">
        <img src="img/2015-06-01/hinhanh-02.jpg" alt="" />
        <br />
        <img src="img/2015-06-01/hinhanh-01.jpg" alt="" />
      </div>
      <div role="tabpanel" class="tab-pane" id="_lichhoc">
        <div class="text-center" style="margin: 30px auto;max-width:200px;">
          <a class="btn btn-danger btn-lg btn-block" href="img/2015-06-01/Lich_Hoc_1-6.docx" style="color: #fff">Download lịch học</a>
        </div>
        <div style="margin: auto;padding: 15px;max-width: 600px;border: 1px solid #333;">
          <h4 class="text-center"><strong>HOẠT ĐỘNG TRỌNG TÂM HÈ</strong></h4>
          <p>- Chương trình ngày hội tuổi thơ – Diễn ra vào 2 ngày: 31/5 và 1/06 (Quốc tế thiếu nhi).</p>
          <p>- Chương trình : “Em là đại sứ du lịch”.</p>
          <p>- Chương trình : “Một ngày làm nhà nông” – lần 2.</p>
          <p>- Sân chơi Hè 2015 tổ chức tại các phường – Quận Gò Vấp.</p>
        </div>
        <img src="img/2015-06-01/bando.jpg" alt="" />
      </div>
    </div>
  </div>

</div>

@stop