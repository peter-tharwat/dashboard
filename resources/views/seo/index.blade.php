@php 
$website_settings=[
    'website_url'=>env('APP_URL'),
    'website_name'=>$settings->website_name,
    'main_color'=>$settings->main_color,
    'hover_color'=>$settings->hover_color,
    'facebook_link'=>$settings->facebook_link,
    'twitter_link'=>$settings->twitter_link,
    'instagram_link'=>$settings->instagram_link,
    'youtube_link'=>$settings->youtube_link,
    'telegram_link'=>$settings->telegram_link,
    'linkedin_link'=>$settings->linkedin_link,
    'whatsapp_link'=>"",
    'tiktok_link'=>$settings->tiktok_link,
    'website_icon'=>$settings->website_icon(),
    'website_logo'=>$settings->website_logo(),
    'website_cover'=>$settings->website_cover(),
    'phone'=>$settings->phone
]; 
$website_settings=collect($website_settings);  
$page_title= isset($page_title)&&$page_title !=null?$website_settings['website_name'].' | '.$page_title:$website_settings['website_name'];
$page_description=isset($page_description)&&$page_description !=null?$page_description:$website_settings['website_name'];
$page_image= isset($page_image)&&$page_image !=null?$page_image:$website_settings['website_cover'];
$page_keywords= isset($page_keywords)&&$page_keywords !=null? $page_keywords:$website_settings['website_name'];
@endphp
<title> {{$page_title}} </title>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "{{$website_settings['website_name']}}",
    "url": "{{$website_settings['website_url']}}",
    "logo": "{{$website_settings['website_logo']}}",
    "sameAs": [
        @if($website_settings['twitter_link']!=null)
        {{$website_settings['twitter_link']}},
        @endif
        @if($website_settings['facebook_link']!=null)
        {{$website_settings['facebook_link']}},
        @endif
        @if($website_settings['youtube_link']!=null)
        {{$website_settings['youtube_link']}},
        @endif
        @if($website_settings['instagram_link']!=null)
        {{$website_settings['instagram_link']}},
        @endif
        @if($website_settings['linkedin_link']!=null)
        {{$website_settings['linkedin_link']}},
        @endif
    ],
    "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "{{$website_settings['phone']}}",
            "contactType": "customer support"
        },
        {
            "@type": "ContactPoint",
            "telephone": "{{$website_settings['phone']}}",
            "contactType": "technical support"
        }, {
            "@type": "ContactPoint",
            "telephone": "{{$website_settings['phone']}}",
            "contactType": "billing support"
        }
    ]
}
</script>
<link rel="manifest" href="{{env('APP_URL')}}/manifest.json">
<meta name="theme-color" content="#314459">
<meta name="mobile-web-app-capable" content="no">
<meta name="application-name" content="{{$website_settings['website_name']}}">
<link rel="icon" sizes="512x512" href="{{$website_settings['website_icon']}}">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="{{$website_settings['website_name']}}">
<link rel="apple-touch-icon" href="{{$website_settings['website_logo']}}">

<link href="{{$website_settings['website_logo']}}" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_logo']}}" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" /> 
<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="#1565c0">
<meta name="msapplication-TileImage" content="{{$website_settings['website_logo']}}">
<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) { 
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) { 
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>

<link rel="icon" type="image/png" href="" /> 
<link rel='alternate' href="{{env('APP_URL')}}{{ urldecode(str_replace('/index.php', '', \Request::getRequestUri()))   }}" hreflang='x-default' />
<link rel="canonical" href="{{env('APP_URL')}}{{ urldecode(str_replace('/index.php', '', \Request::getRequestUri()))  }}">
<!-- SEO Meta -->
<meta name="author" content="{{$website_settings['website_name']}}" />
<!-- end SEO Meta -->

<!-- favicon, cards, tiles, icons -->
<meta name="description" content="{{$page_description}}">
<meta name="keywords" content="{{$page_keywords}}">

<meta name="msapplication-square70x70logo" content="{{$website_settings['website_logo']}}" />
<meta name="msapplication-square150x150logo" content="{{$website_settings['website_logo']}}" />
<meta name="msapplication-wide310x150logo" content="{{$website_settings['website_logo']}}" />
<meta name="msapplication-square310x310logo" content="{{$website_settings['website_logo']}}" />
<link rel="apple-touch-icon-precomposed" href="{{$website_settings['website_logo']}}" />
<!-- end favicon -->
<!-- facebook open graph -->



<meta property="og:type"               content="website" />
<meta property="og:site_name"          content="{{$website_settings['website_name']}}" />
<meta property="og:locale" content="ar_AR"/>
<meta property="og:locale:alternate" content="ar_AR"/>
<meta property="og:url"                content="{{$website_settings['website_url']}}/{{ (\Request::path()=="/")?"": \Request::path() }}" />
<meta property="og:title"              content="{{$page_title}}" />
<meta property="og:description"        content="{{$page_description}}" />
<meta property="og:image" content="{{$page_image}}" />
{{-- <meta property="og:image:width" content="256"/>
<meta property="og:image:height" content="256"/> --}}

 
<!-- Schema MicroData (Google+,Google, Yahoo, Bing,) -->
<meta itemprop="name" content="{{$page_title}}" />
<meta itemprop="url" content="{{$website_settings['website_url']}}" />
<meta itemprop="author" content="{{$website_settings['website_name']}}" />
<meta itemprop="image" content="{{$page_image}}" />
<meta itemprop="description" content="{{$page_description}}" />
<!-- End Schema MicroData -->
<!-- twitter cards -->
<meta name="twitter:image" content="{{$page_image}}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@Author" />
<meta name="twitter:creator" content="@Author" />
<meta name="twitter:title" content="{{$page_title}}" />
<meta name="twitter:image:src" {{$page_image}}/>
<meta name="twitter:description" content="{{$page_description}}" />
<!-- end twitter cards -->


<link rel='help' title='FAQ' href='{{$website_settings['website_url']}}'/>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate, no-transform">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">