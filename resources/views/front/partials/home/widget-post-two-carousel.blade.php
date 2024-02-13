<!-- section header -->
<div class="section-header">
	<h3 class="section-title">{{$posts[0]->category->title}}</h3>
	<img src="frontend/images/wave.svg" class="wave" alt="wave" />
	<div class="slick-arrows-top">
		<button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-right"></i></button>
		<button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-left"></i></button>
	</div>
</div>
<div class="row post-carousel-twoCol post-carousel">
    @foreach ($posts as $item)
	    <!-- post -->
	    <div class="post post-over-content col-md-6">
		<div class="details clearfix">
			<!--a href="category.html" class="category-badge"></a-->
			<h4 class="post-title"><a href="{{url($item->category->slug.'/'.$item->slug)}}">{{$item->title}}</a></h4>
			<ul class="meta list-inline mb-0">
				<li class="list-inline-item"><a href="{{url('authors/'.$item->editor->slug)}}">{{$item->editor->name}}</a></li>
				<li class="list-inline-item">{{date_format($item->created_at,"Y-m-d")}}</li>
			</ul>
		</div>
		<a href="{{url($item->category->slug.'/'.$item->slug)}}">
			<div class="thumb rounded">
				<div class="inner">
					<img src="{{$item->main_image()}}" alt="{{$item->title}}" />
				</div>
			</div>
		</a>
	    </div>
    @endforeach
</div>