@extends('front.app')

@section('header-section')
	@include('front.partials.hero-slide',['posts'=>$featured_posts]) 
	@include('front.partials.home.research',compact('research','most_viewed_research'))
@endsection

@section('content')
	<div class="col-lg-8">

          			@include('front.partials.home.latestposts',$latestposts)

					<div class="spacer" data-height="50"></div>

					<!-- horizontal ads -->
					<div class="ads-horizontal text-md-center">
						<span class="ads-title">- إعلان -</span>
						<a href="#">
							<img src="frontend/images/ads/ad-750.png" alt="Advertisement" />
						</a>
					</div>

					<div class="spacer" data-height="50"></div>
					<!-- section header -->
					<div class="section-header">
					    <h3 class="section-title">أوراق العمل</h3>
					    <img src="frontend/images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
					    <div class="row gy-5">
							@include('front.partials.home.widget-post-two-list',['posts'=>$workshops_latest,'title'=>'الأحدث'])
							@include('front.partials.home.widget-post-two-list',['posts'=>$workshops_most,'title'=>'الأكثر قراءة'])
					    </div>
					</div>
					<div class="spacer" data-height="50"></div>

					@include('front.partials.home.widget-post-two-carousel',['posts'=>$books])

					<div class="spacer" data-height="50"></div>

					@include('front.partials.home.widget-post-list',['posts' => $booksReviews])

	</div>
@endsection