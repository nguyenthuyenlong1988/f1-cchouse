{{-- Created at 2015/06/22 02:56 htien Exp $ --}}

<nav id="topbar" class="ivy-site-topbar">
  <div class="ivy-page-wrapper">
      @if (Auth::guest())
      <a href="{{ url('/') }}" target="_blank">Nhà Văn Hóa Thiếu Nhi Gò Vấp</a>
      @else
      <a href="{{ url('/') }}" target="_blank">Trang chủ</a> &bull; {{ Auth::user()->name }} &laquo; {{ Auth::user()->email }} &raquo; &bull; <a href="{{ url('auth/logout') }}">Thoát</a>
      @endif
  </div>
</nav>
