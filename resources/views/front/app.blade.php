<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">  
	@include('seo.index')

	<link rel="shortcut icon" type="image/x-icon" href="favicon.webp">

	<!-- STYLES -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">	
	<link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend/css/simple-line-icons.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}?version=1" type="text/css" media="all">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146634950-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-146634950-1');
    </script>

    <!-- preloader -->

    <div id="preloader">
	<div class="book">
		<div class="inner">
			<div class="left"></div>
			<div class="middle"></div>
			<div class="right"></div>
		</div>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
    </div>

    <!--div id="fb-root"></!div>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v7.0'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ar_AR/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <Your Chat Plugin code >
    <div-- class="fb-customerchat"
      attribution=setup_tool
      page_id="109986847261559"
    theme_color="#002F59"
    logged_in_greeting="مرحبا .. كيف يمكننا خدمتك ؟"
    logged_out_greeting="مرحبا .. كيف يمكننا خدمتك ؟">
    </div-->
    <!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	<header class="header-default">
		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				<!-- site logo -->
				<a class="navbar-brand" href="{{url('/')}}">
					<img class="logo" src="{{asset('frontend/images/onlylogo.png')}}" alt="شعار المركز المدني" /> 
					<img class="logo-text" src="{{asset('frontend/images/textlogo.webp')}}"alt=" اسم المركز المدني" />
				</a>
				<div class="collapse navbar-collapse">
					<!-- menus -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item  active">
							<a class="nav-link" href="{{url('/')}}">الرئيسية</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('pages/عن-المركز')}}">من نحن</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('pages/contact-us')}}">تواصل معنا</a>
						</li>
					</ul>
				</div>

				<!-- header right section -->
				<div class="header-right">
					@include('front.partials.home.social-icons')
					<!-- header buttons -->
					<div class="header-buttons">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>
			</div>
		</nav>

	</header>  
    
	@yield('header-section')
	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">
			@yield('breadcrumb')

			<div class="row gy-4">

				@yield('content')

				<div class="col-lg-4">

					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<div class="widget rounded">
							<div class="widget-about data-bg-image text-center" data-bg-image="{{asset('frontend/images/map-bg.png')}}">
								<img src="{{asset('frontend/images/onlylogo.png')}}" alt="logo" class="mb-4" />
								<p class="mb-2">أسهم معنا بالكتابة في الشأن اليمني لإثراء ومعالجة الظواهر الاجتماعية والفكرية وكل ما يتصل بالإصلاح الثقافي العام</p>
								<a href="{{url('pages/سياسة-النشر')}}" class="btn btn-default" >ساسية النشر</a>
								<a href="{{url('pages/آلية-الاستكتاب')}}" class="btn btn-default-secondary" >آلية الاستكتاب</a>
							</div>
						</div>

            			@include('front.partials.home.news',$latestnews)

						<!-- widget categories -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">الأقسام</h3>
								<img src="{{asset('frontend/images/wave.svg')}}" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<ul class="list">
									@foreach($categories as $category)
									<li><a href="{{url($category->slug)}}">{{$category->title}}</a><span>({{$category->articles_count}})</span></li>
									@endforeach
								</ul>
							</div>
						</div>
						<!-- widget newsletter -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">القائمة البريدية</h3>
								<img src="{{asset('frontend/images/wave.svg')}}" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<span class="newsletter-headline text-center mb-3">انضم لـ 70,000 مشترك!</span>
								<form>
									<div class="mb-2">
										<input class="form-control w-100 text-center" placeholder="عنوان البريد…" type="email">
									</div>
									<button class="btn btn-default btn-full" type="submit">تسجيل</button>
								</form>
								<span class="newsletter-privacy text-center mt-3">بتسجيل بريدك، أنت توافق على <a href="#">سياسة الخصوصية</a></span>
							</div>		
						</div>

						@include('front.partials.home.widget-post-carousel',['posts' => $policies])

						@include('front.partials.home.widget-post-carousel',['posts' => $discussions])

						<!-- widget tags -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">مواضيع رائجة</h3>
								<img src="{{asset('frontend/images/wave.svg')}}" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<a href="#" class="tag">#مجتمع</a>
								<a href="#" class="tag">#إصلاح_ثقافي</a>
								<a href="#" class="tag">#الجندر</a>
								<a href="#" class="tag">#الأقيال</a>
								<a href="#" class="tag">#المرأة</a>
							</div>		
						</div>

					</div>

				</div>

			</div>

		</div>
	</section>

   

	<!-- footer -->
	<footer>
		<div class="container-xl">
			<div class="footer-inner">
				<div class="row d-flex align-items-center gy-4">
					<!-- copyright text -->
					<div class="col-md-4">
						<span class="copyright">© 2023 المركز المدني. تطوير Space Soft</span>
					</div>

					<!-- social icons -->
					<div class="col-md-4 text-center">
						@include('front.partials.home.social-icons')
					</div>

					<!-- go to top button -->
					<div class="col-md-4">
						<a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>الانتقال للأعلى</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Press ESC to close</h3>
		</div>
		<!-- form -->
		<form class="d-flex search-form">
			<input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
		</form>
	</div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column position-left">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>

	<!-- logo -->
	<div class="logo">
		<img src="{{asset('frontend/images/onlylogo.png')}}" alt="Katen" />
	</div>

	<!-- menu -->
	<nav>
		<ul class="vertical-menu">
		  @php
            $menu = \App\Models\Menu::where('location',"ASIDE_BAR")->with(['links'=>function($q){$q->orderBy('order','ASC');}])->first();
          @endphp
          @if($menu !=null)
          @foreach($menu->links as $link)
    <li class="{{ request()->is($link->url) || request()->url() === $link->url ? 'active' : '' }}">
				<a href="{{$link->url}}">{{$link->title}}</a>
			</li>
		   @endforeach
           @endif
		</ul>
	</nav>

	<!-- social icons -->
	@include('front.partials.home.social-icons')
</div>

<!-- JAVA SCRIPTS -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.sticky-sidebar.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script>
    $(document).ready(function() {
        // Get the current URL path
        var currentPath = window.location.pathname;

        // Remove leading and trailing slashes
        currentPath = currentPath.replace(/^\/|\/$/g, '');

        // Remove the active class from all links
        $('.navbar-nav li').removeClass('active');

        // Add the active class to the corresponding link
        $('.navbar-nav li').each(function() {
            var linkPath = $(this).find('a').attr('href').replace(/^\/|\/$/g, '');
            if (linkPath === currentPath) {
                $(this).addClass('active');
            }
        });
    });
</script>
</body>
</html>