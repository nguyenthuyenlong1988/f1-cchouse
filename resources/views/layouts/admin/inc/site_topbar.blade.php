{{-- Created at 2015/06/22 02:56 htien Exp $ --}}

<nav id="topbar" class="ivy-site-topbar">
  <div class="ivy-page-wrapper">
    @if (Auth::guest())
    <a class="item" href="{{ url('/') }}" target="_blank"><span class="glyphicon glyphicon-home"></span> Nhà Văn Hóa Thiếu Nhi Gò Vấp</a>
    @else
    <ul class="pull-left">
      <li>
        <a class="item" href="{{ url('/') }}" target="_blank"><span class="glyphicon glyphicon-home"></span></a>
      </li>
    </ul>
    <ul class="pull-right">
      <li>
        <span class="item"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</span>
      </li>
      <li>
        <a class="item" href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-option-vertical"></span></a>
      </li>
    </ul>
    @endif
  </div>
</nav>
