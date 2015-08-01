<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Bảo trì &mdash; Nhà Thiếu Nhi Gò Vấp</title>
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300,400&subset=latin,vietnamese' />
  <style>
    html, body {
      height: 100%;
    }

    body {
      margin: 0;
      padding: 0;
      width: 100%;
      color: #111;
      display: table;
      font-weight: 300;
      font-family: 'Alegreya Sans', sans-serif;
    }

    .hidden {
      display: none;
    }

    .header {
      display: table-header-group;
      text-align: center;
    }

    .header h1 {
      margin: 0 0 25px;
      padding: 20px 10px;
      font-size: 40px;
      font-weight: 300;
      color: #fff;
      background-color: #017275;
    }

    .footer {
      display: table-footer-group;
      text-align: center;
    }

    .fb-page {
      padding: 1px 0;
    }

    .container {
      text-align: center;
      display: table-cell;
      vertical-align: middle;
    }

    .content {
      font-weight: 400;
      text-align: center;
      display: inline-block;
    }

    .title {
      font-size: 72px;
      font-weight: 300;
      margin-bottom: 40px;
    }

    #copyright {
      padding: 15px 10px;
      background-color: #017275;
      color: #fff;
    }

    #copyright a {
      color: #b5eaea;
      text-decoration: none;
    }

    #copyright a:hover {
      border-bottom: 1px solid #b5eaea;
    }
  </style>
</head>
<body>
  @include('_layouts.home.inc.billy_neck')

  <div class="header">
    <h1>Nhà Thiếu Nhi Gò Vấp <br /> TP.HCM</h1>
    <div class="fb-page hidden-xs" data-href="https://www.facebook.com/nhathieunhigovap2004" data-hide-cover="false" data-show-facepile="false" data-show-posts="false">
      <div class="fb-xfbml-parse-ignore"></div>
    </div>
  </div>
  <div class="container">
    <div class="content">
      <div class="title">Đang bảo trì.</div>
      <p>Bảo trì chủ nhật, mở lại sáng thứ 2 (ngày 2/8/2015).</p>
    </div>
  </div>
  <div class="footer">
    <div id="copyright" class="billy-copyright">
      <span>&copy; 2015</span> &ndash;
      <span>Bản quyền thuộc về Nhà Thiếu Nhi Gò Vấp. Phát triển bởi <a href="http://hva.io">HVA Team</a>.</span>
    </div>
  </div>

</body>
</html>
