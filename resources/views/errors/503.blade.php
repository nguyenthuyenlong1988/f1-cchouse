<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Bảo trì.</title>
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
      background-color: #64b862;
      text-align: center;
    }

    .header h1 {
      margin: 8px 0;
      font-size: 40px;
      font-weight: 300;
      color: #fff;
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
      text-align: center;
      display: inline-block;
    }

    .title {
      font-size: 72px;
      margin-bottom: 40px;
    }
  </style>
</head>
<body>
  @include('_layouts.home.inc.billy_neck')

  <div class="header">
    <h1>Nhà Thiếu Nhi Gò Vấp</h1>
    <div class="fb-page hidden-xs" data-href="https://www.facebook.com/nhathieunhigovap2004" data-hide-cover="false" data-show-facepile="false" data-show-posts="false">
      <div class="fb-xfbml-parse-ignore"></div>
    </div>
  </div>
  <div class="container">
    <div class="content">
      <div class="title">Đang bảo trì.</div>
    </div>
  </div>
</body>
</html>
