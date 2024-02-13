<!-- widget post carousel -->
<div class="widget rounded">
	<div class="widget-header text-center">
		<h3 class="widget-title">{{$posts[0]->category->title}}</h3>
		<img src="{{asset('frontend/images/wave.svg')}}" class="wave" alt="wave" />
	</div>
	<div class="widget-content">
		<div class="post-carousel-widget">

        @foreach ($posts as $item)
			<!-- post -->
			<div class="post post-carousel">
				<div class="thumb rounded">
					<a href="{{url($item->category->slug.'/'.$item->slug)}}">
						<div class="inner">
							<img src="{{$item->main_image()}}" alt="{{$item->title}}" />
						</div>
					</a>
				</div>
				<h5 class="post-title mb-0 mt-4"><a href="{{url($item->category->slug.'/'.$item->slug)}}">{{$item->title}}</a></h5>
				<ul class="meta list-inline mt-2 mb-0">
					<li class="list-inline-item"><a href="{{url('authors/'.$item->editor->slug)}}">{{$item->editor->name}}</a></li>
					<li class="list-inline-item">{{date_format($item->created_at,"Y-m-d")}}</li>
				</ul>
			</div>
         @endforeach
		</div>
		<!-- carousel arrows -->
		<div class="slick-arrows-bot">
			<button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-right"></i></button>
			<button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-left"></i></button>
		</div>
	</div>		
</div>