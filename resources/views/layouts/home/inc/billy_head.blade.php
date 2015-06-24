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
<base href="{{ Request::getBaseUrl() }}/" />
<title>@yield('page_title') &mdash; {{ config('params.page_title') }}</title>
<meta name="description" content="@yield('page_description', config('params.page_description'))" />
<meta name="keywords" content="@yield('page_keywords', config('params.page_keywords'))" />
<link rel="pingback" href="javascript:void(0)" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="https://plus.google.com/+ThichlinuxNet" />
<link rel="publisher" href="https://plus.google.com/+ThichlinuxNet" />
<link rel="shortcut icon" href="javascript:void(0)" sizes="16x16" />
<link rel="icon" href="javascript:void(0)" sizes="16x16" />

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600&amp;subset=latin,vietnamese" />
<!--[if lt IE 9]><script src="vendor/html5shiv/3.7.2/js/html5shiv.min.js"></script><![endif]-->
<link rel="stylesheet" href="vendor/bootstrap/3.3.4/css/bootstrap.min.css" />

@yield('page_css')

<link rel="stylesheet" href="css/stupid-google-fix.css" />

<script src="vendor/modernizr/2.8.3/js/modernizr.min.js"></script>
<script src="vendor/jquery/1.11.1/js/jquery.min.js"></script>
<script src="vendor/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
//<![CDATA[
  var
    cfg = {
      app_name               : '{{ config('params.app_name') }}',
      client_time            : new Date().getTime(),
      site_name              : decodeURIComponent('{{ rawurlencode(config('params.site_name')) }}'),
      page_base_url          : '{{ Request::getBaseUrl() }}',
      page_assets_url        : '{{ Request::getBaseUrl() }}',
      page_title             : decodeURIComponent('{{ rawurlencode(config('params.page_title')) }}'),
      page_charset           : '{{ config('params.page_charset') }}',
      js_debug               : true,
      js_standbymode_debug   : true,
      standbymode_time       : 90
    },
    dc = function(a,b,c,d,e,f){if(e=function(a){return(b>a?"":e(parseInt(a/b)))+(35<(a%=b)?String.fromCharCode(a+29):a.toString(36))},!"".replace(/^/,String)){for(;c--;)f[e(c)]=d[c]||e(c);d=[function(a){return f[a]}],e=function(){return"\\w+"},c=1}for(;c--;)d[c]&&(a=a.replace(RegExp("\\b"+e(c)+"\\b","g"),d[c]));return a},up=eval;
//]]>
</script>

@yield('page_js_preload')