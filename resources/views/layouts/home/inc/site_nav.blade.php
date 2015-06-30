{{-- Created at 2015/05/27 05:08 htien Exp $ --}}

<nav id="navbar" class="ivy-site-nav ivy-site-navbar navbar">
  <div class="ivy-page-wrapper">

    <div id="navbar-menu-wrapper">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand active" href="{{ route('home') }}">
          <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        </a>
      </div>

      <div id="bs-navbar-collapse-1" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{ route('actnews.index') }}">Tin Tức - Hoạt Động<span class="sr-only">(current)</span></a></li>
          <li><a href="javascript:void(0)">Phòng Ban</a></li>
          <li><a href="javascript:void(0)">Ghi Danh Năng Khiếu</a></li>
          <li><a href="javascript:void(0)">Hoạt Động Thanh Thiếu Nhi</a></li>
          <li><a href="javascript:void(0)">Góc Măng Non</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Liên Hệ</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Giới Thiệu</a></li>
              <li class="divider"></li>
              <li><a href="#" data-toggle="modal" data-target="#my-message">Thông tin website</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>
