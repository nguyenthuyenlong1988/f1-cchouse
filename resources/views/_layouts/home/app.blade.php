{{-- Created at 2015/05/27 03:29 htien Exp $ --}}
<!DOCTYPE html>
<!--[if lt IE 7]>      <html id="_com" class="lt-ie9 lt-ie8 lt-ie7" lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 7]>         <html id="_com" class="lt-ie9 lt-ie8" lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 8]>         <html id="_com" class="lt-ie9" lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if gt IE 8]><!--> <html id="_com" class="no-borderradius no-boxshadow has-transition has-background" lang="en-US" dir="ltr" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<head>
  <meta charset="UTF-8" />
  <!-- BILLY_HEAD BEGIN -->
  @include('_layouts.home.inc.billy_head')

  <!-- BILLY_HEAD END -->
</head>
<body @yield('page_body_attributes')>

  @include('_layouts.home.inc.billy_neck')

  <!-- PAGE BEGIN -->
  <div id="page" class="clearfix">

    <!-- SITE_HEADER BEGIN -->
    <header id="header" class="ivy-site-header">

      @include('_layouts.home.inc.site_topbar')

      @include('_layouts.home.inc.site_header')

      @include('_layouts.home.inc.site_nav')

    </header>

    <!-- SITE_HEADER END -->

    <!-- MAIN BEGIN -->
    <main id="main" class="ivy-site-main">

      @include('_layouts.home.inc.site_main')

    </main>

    <!-- MAIN END -->

    <!-- SITE_FOOTER BEGIN -->
    <footer id="footer" class="ivy-site-footer">

      @include('_layouts.home.inc.site_footer')

    </footer>

    <!-- SITE_FOOTER END -->

  </div>

  <!-- PAGE END -->

  <!-- BILLY_FOOT BEGIN -->
  @include('_layouts.home.inc.billy_foot')

  <!-- BILLY_FOOT END -->

  <!-- ***** AUTO-GENERATE ^^ ***** -->

</body>
</html>
