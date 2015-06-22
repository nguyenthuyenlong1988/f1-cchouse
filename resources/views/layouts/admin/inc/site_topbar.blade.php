{{-- Created at 2015/06/22 02:56 htien Exp $ --}}

<nav id="topbar" class="ivy-site-topbar">
  <div class="panel panel-default">
    <div class="panel-body">
      @if (Auth::guest())
      Nhà Văn Hóa Thiếu Nhi Gò Vấp
      @else
      {{ Auth::user()->name }} { <a href="{{ url('auth/logout') }}">Đăng xuất</a> }
      @endif
    </div>
  </div>
</nav>
