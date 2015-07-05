{{-- Created at 2015/05/27 05:06 htien Exp $ --}}

@if (Route::is('intro'))
<div style="padding: 1px 0;font-size: 11px;color: #e22f2f;background-color: #fff">
  <div class="ivy-page-wrapper">
    <span class="glyphicon glyphicon-info-sign"></span>
    Phiên bản BETA (website đang trong quá trình xây dựng)
  </div>
</div>
@endif

@if (! Route::is('enrolstudents'))
<section id="enrolstudents-section" class="ivy-section">
<div>
  <h2>
    <a href="{{ route('enrolstudents') }}">
      <span class="glyphicon glyphicon-star"></span>
      Chiêu sinh khóa mới 2015
      <span class="glyphicon glyphicon-star"></span>
    </a>
  </h2>
</div>
</section>
@endif

<nav id="topbar" class="ivy-site-topbar">
  <div class="ivy-page-wrapper">

    <div class="col-md-6 col-md-push-6">
      <div id="socialurls-wrapper" class="text-right">
        <img src="img/facebook_sc_32.png" alt="" />
        <img src="img/youtube_sc_32.png" alt="" />
        <img src="img/email_sc_32.png" alt="" />
      </div>
    </div>

    <div class="col-md-6 col-md-pull-6">
      {{--<h1 style="margin:12px 0 0 -15px;font-size:24px;font-weight:300">Chào mừng bạn đến website</h1>--}}
      <img src="img/welcome_you.png" alt="Chào mừng bạn"/>
      {{--<div id="site-search-wrapper">--}}
        {{--<div id="site-search">--}}
          {{--<form>--}}
            {{--<input class="search-input" type="text" placeholder="tìm kiếm..." />--}}
            {{--<button class="search-btn" onclick="javascript:return false">Go</button>--}}
          {{--</form>--}}
        {{--</div>--}}
      {{--</div>--}}
    </div>

  </div>
</nav>
