<!-- section header -->
<div class="section-header">
	<h3 class="section-title">المقالات البحثية</h3>
	<img src="frontend/images/wave.svg" class="wave" alt="wave" />
</div>
<div class="padding-30 rounded bordered">
	<div class="row gy-5">
		<div class="col-sm-6">
			<!-- post -->
			<div class="post">
				<div class="thumb rounded">
					<a href="{{url('/'.$latestposts[0]->category->slug)}}" class="category-badge position-absolute">مقالات بحثية</a>
					<!--span class="post-format">
						<i class="icon-picture"></i>
					</span-->
					<a href="{{url($latestposts[0]->category->slug.'/'.$latestposts[0]->slug)}}">
						<div class="inner">
							<img src="{{$latestposts[0]->main_image()}}" alt="{{$latestposts[0]->title}}" />
						</div>
					</a>
				</div>
				<ul class="meta list-inline mt-4 mb-0">
					<li class="list-inline-item"><a href="{{url('authors/'.$latestposts[0]->editor->slug)}}"><img src="{{$latestposts[0]->editor->avatar('tiny')}}" class="author" alt="author"/>{{$latestposts[0]->editor->name}}</a></li>
					<li class="list-inline-item">{{date_format($latestposts[0]->created_at,"Y-m-d")}}</li>
				</ul>
				<h5 class="post-title mb-3 mt-3"><a href="{{url($latestposts[0]->category->slug.'/'.$latestposts[0]->slug)}}">{{$latestposts[0]->title}}</a></h5>
				<p class="excerpt mb-0">{{$latestposts[0]->meta_description}}</p>
			</div>
		</div>
		<div class="col-sm-6">
            @foreach ($latestposts as $item)
                @if ($loop->first)
                    @continue
                @endif
			<!-- post -->
			<div class="post post-list-sm square">
				<div class="thumb rounded">
					<a href="{{url($item->category->slug.'/'.$item->slug)}}">
						<div class="inner">
							<img src="{{$item->main_image()}}" alt="{{$item->title}}" />
						</div>
					</a>
				</div>
				<div class="details clearfix">
					<h6 class="post-title my-0"><a href="{{url($item->category->slug.'/'.$item->slug)}}">{{$item->title}}</a></h6>
                    <ul class="meta list-inline mb-0">
                        <li class="list-inline-item"><a href="{{url('/authors/'.$item->editor->slug)}}">{{$item->editor->name}}</a></li>
                        <li class="list-inline-item">{{date_format($item->created_at,"Y-m-d")}}</li>
                    </ul>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</div>