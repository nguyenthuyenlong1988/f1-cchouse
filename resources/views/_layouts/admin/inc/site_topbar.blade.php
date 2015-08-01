{{-- Created at 2015/06/22 02:56 htien Exp $ --}}

<nav id="topbar" class="ivy-site-topbar">
  <div class="ivy-page-wrapper">
    @if (Auth::guest())
    <a class="item text-center" href="{{ url('/') }}" target="_blank"><span class="glyphicon glyphicon-globe"></span> Nhà Thiếu Nhi Gò Vấp</a>
    @else
    <ul class="ivy-topbar ivy-topbar-left">
      <li class="topbar-item">
        <a class="item" href="javascript:void(0)"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
      </li>
      <li class="topbar-item menu-profile">
        <span class="item" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-user"></span> <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </span>
        <ul class="dropdown-menu">
          <li><a href="javascript:void(0)"><span class="text-muted"><span class="glyphicon glyphicon-edit"></span> Hồ sơ tài khoản (unavailable)</span></a></li>
          <li><a href="javascript:void(0)"><span class="text-muted"><span class="glyphicon glyphicon-envelope"></span> Hộp thư (unavailable)</span></a></li>
          <li role="separator" class="divider"></li>
          <li><a href="javascript:void(0)"><span class="text-muted"><span class="glyphicon glyphicon-lock"></span> Đổi mật mã (unavailable)</span></a></li>
        </ul>
      </li>
      <li class="topbar-item menu-notification">
        <a class="item" href="javascript:void(0)" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-bell"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="javascript:void(0)"><span class="text-muted">Không có thông báo</span></a></li>
        </ul>
      </li>
    </ul>
    <ul class="ivy-topbar ivy-topbar-right">
      <li class="topbar-item hidden-xs">
        <a class="item" href="{{ url('/') }}" target="_blank"><span class="glyphicon glyphicon-globe"></span></a>
      </li>
      <li class="topbar-item menu-preference">
        <a class="item" href="javascript:void(0)" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-option-vertical"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="javascript:void(0)"><span class="text-muted"><span class="glyphicon glyphicon-cog"></span> Tùy chỉnh giao diện (unavailable)</span></a></li>
          <li><a href="javascript:void(0)"><span class="text-muted"><span class="glyphicon glyphicon-question-sign"></span> Trợ giúp (unavailable)</span></a></li>
          <li role="separator" class="divider"></li>
          <li><a href="javascript:void(0)"><span class="text-muted"><span class="glyphicon glyphicon-info-sign"></span> Thông tin (unavailable)</span></a></li>
          <li role="separator" class="divider"></li>
          <li><a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Thoát (bye!)</a></li>
        </ul>
      </li>
    </ul>
    @endif
  </div>
</nav>
