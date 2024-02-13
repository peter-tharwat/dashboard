<!-- widget popular posts -->
<div class="widget rounded">
	<div class="widget-header text-center">
		<h3 class="widget-title">أخبار المركز</h3>
		<img src="{{asset('frontend/images/wave.svg')}}" class="wave" alt="wave" />
	</div>
	<div class="widget-content">
        @foreach ($latestnews as $item)
			<!-- post -->
			<div class="post post-list-sm square">
				<div class="thumb rounded">
					<a href="{{url($item->category->slug.'/'.$item->slug)}}">
						<div class="inner">
							<img src="{{$item->main_image('tiny')}}" alt="{{$item->title}}" />
						</div>
					</a>
				</div>
				<div class="details clearfix">
					<h6 class="post-title my-0"><a href="{{url($item->category->slug.'/'.$item->slug)}}">{{$item->title}}</a></h6>
					<ul class="meta list-inline mb-0">
                        <li class="list-inline-item">{{date_format($item->created_at,"Y-m-d")}}</li>
					</ul>
				</div>
			</div>
        @endforeach
	</div>		
</div>