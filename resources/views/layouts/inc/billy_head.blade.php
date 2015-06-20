{{-- Created at 2015/05/27 04:34 htien Exp $ --}}

<!--

    Theme Name: CCHouse
    Theme URL: http://www.example.com
    Author: Billy Tien
    Author URI: http://www.nvhtien.com
    Version: 1.0
    Description: Experimental
    Features: HTML5 (W3C Standard), Multi-columns, Responsive...
    License: GNU General Public License
    License URI: license.txt
    Tags: simple

-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="MobileOptimized" content="width" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<base href="{{ url('/') }}/" />
<title>[Demo @yield('page_title')] &mdash; Nhà Văn Hóa Thiếu Nhi Gò Vấp</title>
<meta name="description" content="@yield('page_description', 'Nhà Văn Hóa Thiếu Nhi &mdash; Quận Gò Vấp &mdash; TP.HCM')" />
<meta name="keywords" content="@yield('page_keywords', 'nha van hoa, thieu nhi, quan go vap, ho chi minh')" />
<link rel="pingback" href="javascript:void(0)" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="https://plus.google.com/+ThichlinuxNet" />
<link rel="publisher" href="https://plus.google.com/+ThichlinuxNet" />
<link rel="shortcut icon" href="javascript:void(0)" sizes="16x16" />
<link rel="icon" href="javascript:void(0)" sizes="16x16" />

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600&amp;subset=latin,vietnamese" />
<!--[if lt IE 9]><script src="vendor/html5shiv/3.7.2/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="vendor/bootstrap/3.3.4/css/bootstrap.css" />

@yield('page_css')

<link rel="stylesheet" href="css/stupid-google-fix.css" />

<script src="vendor/modernizr/2.8.3/js/modernizr.js"></script>
<script src="vendor/jquery/1.11.1/js/jquery.js"></script>
<script src="vendor/bootstrap/3.3.4/js/bootstrap.js"></script>

@yield('page_js_preload')

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64248666-1', 'auto');
  ga('send', 'pageview');

</script>