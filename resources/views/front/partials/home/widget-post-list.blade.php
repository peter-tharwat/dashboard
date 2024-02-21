<!-- section header -->
<div class="section-header">
	<h3 class="section-title">{{$posts[0]->category->title}}</h3>
	<img src="frontend/images/wave.svg" class="wave" alt="wave" />
</div>
<div class="padding-30 rounded bordered">
	<div class="row">

        @foreach ($posts as $item)
		<div class="col-md-12 col-sm-6">
			<!-- post -->
			<div class="post post-list clearfix">
				<div class="thumb rounded">
					<a href="{{url($item->category->slug.'/'.$item->slug)}}">
						<div class="inner">
							<img src="{{$item->main_image()}}" alt="{{$item->title}}"  />
						</div>
					</a>
				</div>
				<div class="details">
					<ul class="meta list-inline mb-3">
						<li class="list-inline-item"><a href="{{url('authors/'.$item->editor->slug)}}">{{$item->editor->name}}</a></li>
						<li class="list-inline-item">{{date_format($item->created_at,"Y-m-d")}}</li>
					</ul>
					<h5 class="post-title"><a href="{{url($item->category->slug.'/'.$item->slug)}}">{{$item->title}}</a></h5>
					<p class="excerpt mb-0">{{$item->meta_description}}</p>
				</div>
			</div>
		</div>
        @endforeach
	</div>
	<!-- load more button -->
	<div class="text-center">
		<button class="btn btn-simple">تحميل المزيد...</button>
	</div>
</div>