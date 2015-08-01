{{-- Created at 2015/06/21 10:54 htien Exp $ --}}

<!--

    Theme Name: CCHouse Admin
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
<title>@yield('page_title') :: {{ config('params.page_title') }}</title>
<meta name="description" content="@yield('page_description', config('params.page_description'))" />
<link rel="author" href="https://plus.google.com/+ThichlinuxNet" />
<link rel="publisher" href="https://plus.google.com/+ThichlinuxNet" />
<link rel="shortcut icon" href="favicon.ico" sizes="16x16" />
<link rel="icon" href="favicon.ico" sizes="16x16" />

<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,300,500&amp;subset=latin,vietnamese,latin-ext" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&amp;subset=latin,vietnamese,latin-ext" />
<!--[if lt IE 9]><script src="assets/libs/html5shiv/3.7.2/js/html5shiv.min.js"></script><![endif]-->
<link rel="stylesheet" href="assets/libs/bootstrap/3.3.5/css/bootstrap.min.css" />

@yield('page_css')

<link rel="stylesheet" href="assets/libs/gem/1.0/css/stupid-google-fix.css" />

<!--[if lt IE 9]>
<script src="assets/libs/html5shiv/3.7.2/js/html5shiv.min.js"></script>
<script src="assets/libs/respond/1.4.2/js/respond.min.js"></script>
<![endif]-->

<script>
//<![CDATA[
  var
    cfg = {
      // Base configuration
      app_name               : '{{ config('params.app_name') }}',
      api_url                : '{{ Request::getBaseUrl() }}' + '/_api',
      client_time            : new Date().getTime(),
      site_name              : decodeURIComponent('{{ rawurlencode(config('params.site_name')) }}'),
      page_base_url          : '{{ Request::getBaseUrl() }}',
      page_assets_url        : '{{ Request::getBaseUrl() }}/assets',
      page_getimage          : '{{ route('_image.index') }}',
      page_title             : decodeURIComponent('{{ rawurlencode(config('params.page_title')) }}'),
      page_charset           : '{{ config('params.page_charset') }}',
      js_debug               : true,
      js_standbymode_debug   : true,
      standbymode_time       : 90,

      // Advanced configuration
      is_login               : {{ ($isLogin = Auth::check()) ? 1 : 0 }},
      uid                    : '{{ $isLogin ? Auth::user()->id : ''  }}'
    },

    dc = function(a,b,c,d,e,f){if(e=function(a){return(b>a?"":e(parseInt(a/b)))+(35<(a%=b)?String.fromCharCode(a+29):a.toString(36))},!"".replace(/^/,String)){for(;c--;)f[e(c)]=d[c]||e(c);d=[function(a){return f[a]}],e=function(){return"\\w+"},c=1}for(;c--;)d[c]&&(a=a.replace(RegExp("\\b"+e(c)+"\\b","g"),d[c]));return a},up=eval;
//]]>
</script>

@yield('page_js_preload')
