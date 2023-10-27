@php 
$website_settings=[
    'website_url'=>env('APP_URL'),
    'website_name'=>$settings['website_name'],
    'main_color'=>$settings['main_color'],
    'second_color'=>$settings['hover_color'],
    'social_links'=>[
        'facebook_link'=>$settings['facebook_link'],
        'twitter_link'=>$settings['twitter_link'],
        'instagram_link'=>$settings['instagram_link'],
        'youtube_link'=>$settings['youtube_link'],
        'linkedin_link'=>$settings['linkedin_link'],
        'tiktok_link'=>$settings['tiktok_link']
    ],
    'website_icon'=>$settings['get_website_icon']/*"data:image/png;base64,". base64_encode(file_get_contents($settings->website_icon()))*/, //lite
    'website_icon_url'=>$settings['get_website_icon'], //lite
    'website_logo'=>$settings['get_website_logo'], //lite
    'website_cover'=>$settings['get_website_cover'],  //lite
    'phone'=>$settings['phone'],
    'search_url'=>env('APP_URL')."/q",
    'faq_url'=>env('APP_URL')."/faq",
    'feed_url'=>env('APP_URL')."/feed",
    'feed_title'=>"آخر الأخبار",
    'cache_pages'=>1,
    'canonical'=>str_replace('/index.php', '', request()->url()),
    'twitter_author'=>"Nafezly"
]; 
$website_settings=collect($website_settings);  
if(request()->url()==env("APP_URL"))
$page_title=  isset($page_title)&&$page_title !=null?$website_settings['website_name'] .' | '. $page_title :$website_settings['website_name'];
else
$page_title=  isset($page_title)&&$page_title !=null?$page_title.' | '.$website_settings['website_name']:$website_settings['website_name'];
$page_description=isset($page_description)&&$page_description !=null?$page_description:$website_settings['website_name'];
$page_image= isset($page_image)&&$page_image !=null?$page_image:$website_settings['website_cover'];
$page_keywords= isset($seo_key_words)&&$seo_key_words !=null? $seo_key_words:"";
$website_settings['canonical']= isset($canonical) && $canonical!=null ? $canonical:$website_settings['canonical'];
@endphp
<title>{{$page_title}}</title>
<meta name="title" content="{{$page_title}}">
<!---
وَما نَيلُ المَطالِبِ بِالتَمَنّي وَلَكِن تُؤخَذُ الدُنيا غِلاباوَ
ما اِستَعصى عَلى قَومٍ مَن الٌإِذا الإِقدامُ كانَ لَهُم رِكابا
أحمد شوقي
---> 
<link rel="icon" type="image/png" href="{{$website_settings['website_icon']!=null?$website_settings['website_icon']:$website_settings['website_icon_url']}}" /> 
<link rel="icon" type="image/png" sizes="512x512" href="{{$website_settings['website_icon']!=null?$website_settings['website_icon']:$website_settings['website_icon_url']}}" />
<link rel="manifest" href="{{$website_settings['website_url']}}/manifest.json">
<meta name="theme-color" content="{{$website_settings['main_color']}}">
<meta name="mobile-web-app-capable" content="no">
<meta name="application-name" content="{{$website_settings['website_name']}}">


<meta name="facebook-domain-verification" content="vymdke86bl9vdcyleijy0r173c6k7c" />
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="{{$website_settings['website_name']}}">
<link rel="apple-touch-icon" href="{{$website_settings['website_icon_url']}}?v=2">

<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{$website_settings['website_icon_url']}}" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" /> 

<link rel='alternate' href="{{request()->url()}}" hreflang='x-default' />

<meta name="author" content="{{$website_settings['website_name']}}" />
<meta name="description" content="{{$page_description}}">
<link rel="canonical" href="{{$website_settings['canonical']}}">

@if($page_keywords)
<meta name="keywords" content="{{$page_keywords}}">
@endif

<meta name="msapplication-TileColor" content="{{$website_settings['main_color']}}">
<meta name="msapplication-TileImage" content="{{$website_settings['website_icon_url']}}">
<meta name="msapplication-square70x70logo" content="{{$website_settings['website_cover']}}" />
<meta name="msapplication-square150x150logo" content="{{$website_settings['website_cover']}}" />
<meta name="msapplication-wide310x150logo" content="{{$website_settings['website_cover']}}" />
<meta name="msapplication-square310x310logo" content="{{$website_settings['website_cover']}}" />
<link rel="apple-touch-icon-precomposed" href="{{$website_settings['website_cover']}}" />

<meta property="og:type"               content="website" />
<meta property="og:site_name"          content="{{$website_settings['website_name']}}" />
<meta property="og:locale" content="ar_AR"/>
<meta property="og:locale:alternate" content="ar_AR"/>
<meta property="og:url"                content="{{request()->url()}}" />
<meta property="og:title"              content="{{$page_title}}" />
<meta property="og:description"        content="{{$page_description}}" />
<meta property="og:image" content="{{$page_image}}" />

<meta itemprop="name" content="{{$page_title}}" />
<meta itemprop="url" content="{{$website_settings['website_url']}}" />
<meta itemprop="author" content="{{$website_settings['website_name']}}" />
<meta itemprop="image" content="{{$page_image}}" />
<meta itemprop="description" content="{{$page_description}}" />

<meta name="twitter:image" content="{{$page_image}}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{'@'.$website_settings['twitter_author']}}" />
<meta name="twitter:creator" content="{{'@'.$website_settings['twitter_author']}}" />
<meta name="twitter:title" content="{{$page_title}}" />
<meta name="twitter:image:src" content="{{$page_image}}" />
<meta name="twitter:description" content="{{$page_description}}" />


@if($website_settings['faq_url']!=null)
<link rel='help' title='FAQ' href='{{$website_settings['faq_url']}}'/>
@endif
@if($website_settings['feed_title']!=null && $website_settings['feed_url'] !=null)
<link rel="alternate" type="application/rss+xml" title="{{$website_settings['feed_title']}}" href="{{$website_settings['feed_url']}}">
@endif
@if($website_settings['cache_pages']==0)
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate, no-transform">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
@endif
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "{{$website_settings['website_name']}}",
    "url": "{{$website_settings['website_url']}}",
    "logo": "{{$website_settings['website_icon_url']}}",
    @php
    $social_links=[];
    foreach($website_settings['social_links'] as $key => $link){
        if($link!=null)array_push($social_links, $link);
    }
    @endphp
    @if(count($social_links))
    "sameAs": [
       
        @foreach($social_links as $link)
            @if($link!="")
                "{{$link}}" 
                @if(!$loop->last),@endif
            @endif
        @endforeach
    ],
    @endif
    "contactPoint": [
        @if($website_settings['phone']!=null)
        {
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
        @endif
    ]
}
{
    "@context": "http://schema.org",
    "@type": "WebSite",
    "url": "{{$website_settings['website_url']}}",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{$website_settings['search_url']}}?key={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "{{$page_title}}",
    "description": "{{$page_description}}",
    "publisher": {
        "@type": "Organization",
        "name": "{{$website_settings['website_name']}}"
    }
}
</script>
<script type="text/javascript">
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