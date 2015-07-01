{{-- Created at 2015/06/30 22:21 htien Exp $ --}}
@extends('layouts.home.main_page')

@section('page_title', 'Giới Thiệu')
@section('page_body_attributes')
id="intro-page"
@stop

@section('page_css')
@parent

<style>
  #intro-page .content {
    line-height: 1.7;
  }

  #intro-page p::first-letter {
    margin-left: 30px;
  }

  .pg-image {
    margin-top: 25px;
    margin-bottom: 25px;
  }

  .pg-image-one img {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }

  .pg-image .img-note {
    display: block;
    margin-top: 5px;
    font-size: 96%;
    text-align: center;
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

  <h1 class="page-header"><span class="glyphicon glyphicon-info-sign"></span> Giới Thiệu</h1>
  <div class="content">
    <h2 class="page-heading">Nhà thiếu nhi quận Gò Vấp<br /><small>Tụ điểm vui chơi lành mạnh của Thanh thiếu niên</small></h2>
    <div class="text-center text-large">
      <span class="glyphicon glyphicon-bullhorn"></span>
      Tiến tới kỷ niệm 70 năm<br />ngày thành lập Đội Thiếu niên Tiền phong Hồ Chí Minh<br />(15/5/1941 – 15/5/2011)
    </div>
    <br />
    <p>
      <strong>
        Năm 2010, Nhà thiếu nhi Quận Gò Vấp được tặng Cờ thi đua dẫn đầu Cụm của Thành phố,
        và Bằng khen của Trung ương Đoàn. Có được sự ghi nhận đó là do Đơn vị đã tổ chức nhiều hoạt động phong phú,
        đa dạng đáp ứng nhu cầu vui chơi hồn nhiên củathanh thiếu niên trong quận.
      </strong>
    </p>
    <p>
      Không chỉ tổ chức những hoạt động vui chơi lành mạnh trong những dịp lễ tết;
      ngày hội tuổi thơ chào mừng quốc tế Thiếu nhi 1/6 từ 30/5 đến 2/6/2010 với Chương trình ẩm thực các miền,
      sân chơi dân gian, giúp các em hiểu thêm về nét đẹp văn hóa của từng vùng miền Tổ quốc.
      Chương trình ca múa nhạc đặc sắc với chủ đề “Mùa hè yêu thương” vừa phục vụ các em,
      vừa gây quỹ học bổng tặng thiếu nhi có hoàn cảnh khó khăn… đã thu hút từ 3.000 - 5.000 lượt thiếu nhi và phụ huynh mỗi ngày.
    Chương trình “Vui Hội trăng rằm - Lễ hội hoa đăng” Tết Trung thu diễn ra từ 18/9 đến 22/9/2010,
    do các em thiếu nhi tự thiết kế các cụm tiểu cảnh, tái hiện và giới thiệu cảnh đẹp quê hương Việt Nam với đồng lúa,
    bờ sông, ao sen, cầu tre…, với chủ đề về “Vui hội trăng rằm” bằng những cảm nhận và năng khiếu mỹ thuật,
    các em đã vẽ nên những hoạt động vui chơi trung thu rộn ràng, đầy những ước mơ xanh về trái đất hòa bình.
    Trong hơn 1 tháng chuẩn bị với sự cộng tác của 150 đoàn viên thanh niên tình nguyện tham gia dựng các gian hàng sân chơi,
    gian hàng ẩm thực và hỗ trợ Ban tổ chức, hơn 500 em các lớp năng khiếu: võ thuật, múa, kịch, hát,
    khiêu vũ thể thao và thể dục nhịp điệu hóa trang…
    Có thể nói chương trình “Vui hội trăng rằm - Lễ hội hoa đăng” Trung Thu năm 2010 là chương trình quy mô
    và được đầu tư công phu nhất từ trước đến nay về mọi phương diện.
    </p>
    <div class="pg-image pg-image-one">
      <img src="img/gioi-thieu/gioi-thieu-01.jpg" alt="Giới thiệu nhà thiếu nhi" />
      <span class="img-note">"Sử ca Việt Nam" đã trở thành chương trình thường niên của Nhà thiếu nhi quận</span>
    </div>
    <p>
      Không chỉ tập trung vào các cao điểm, các chủ đề, các hoạt động giáo dục,
      bồi dưỡng năng khiếu tại nhà thiếu nhi cũng được duy trì đều đặn,
      kết quả thể hiện qua các cuộc hội thi, hội diễn thành phố như:
      giải ba toàn thành trong Chương trình “Sử ca Việt Nam”,
      giải A “Liên hoan Búp Sen hồng lần thứ 17” toàn quốc tổ chức tại Vũng Tàu,
      giải nhất Taekwondo khu vực phía Nam được tổ chức tại Thành phố Biên Hòa - Đồng Nai,
      giải ba hội thi vẽ tranh thiếu nhi do Bảo tàng Tôn Đức Thắng tổ chức,
      giải A về trò chơi dân gian trong liên hoan các Nhà thiếu nhi,
      giải A đại hội võ lâm… Trong chương trình “Bước nhảy hoàn vũ” do Đài truyền hình Việt Nam tổ chức,
      Nhà thiếu nhi Quận có 10 đôi thiếu nhi tham gia và kết quả là em Vĩnh Thảo đạt giải Huy chương đồng,
      em Khánh Uyên đã đạt Huy chương Bạc. Chia sẻ với các bạn thiếu nhi có hoàn cảnh khó khăn,
      NTN quận đã tặng 50 suất học bổng cho các bạn vượt khó học giỏi.
    </p>
    <p class="pg-source">Ban Quản Trị (NTNGV).</p>
  </div>

</div>

@stop
