	<!-- hero section -->
	<section style="margin-top: 60px;" id="hero">

		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">
					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">الأبحاث</h3>
						<img src="frontend/images/wave.svg" class="wave" alt="wave" />
					</div>
					<!-- featured post large -->
					<div class="post featured-post-lg">
						<div class="details clearfix">
							<a href="{{url('/'.$research[0]->category->slug)}}" class="category-badge">الأبحاث</a>
							<h2 class="post-title"><a href="{{url($research[0]->category->slug.'/'.$research[0]->slug)}}">{{$research[0]->title}}</a></h2>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item"><a href="{{url('/authors/'.$research[0]->editor->slug)}}">{{$research[0]->editor->name}}</a></li>
								<li class="list-inline-item">{{date_format($research[0]->created_at,"Y-m-d")}}</li>
							</ul>
						</div>
						<a href="{{url($research[0]->category->slug.'/'.$research[0]->slug)}}">
							<div class="thumb rounded">
								<div class="inner data-bg-image" data-bg-image="{{$research[0]->main_image()}}"></div>
							</div>
						</a>
					</div>

				</div>

				<div class="col-lg-4">

					<!-- post tabs -->
					<div class="post-tabs rounded bordered">
						<!-- tab navs -->
						<ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
							<li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">الأحدث</button></li>
							<li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">الأكثر قراءة</button></li>
						</ul>
						<!-- tab contents -->
						<div class="tab-content" id="postsTabContent">
							<!-- loader -->
							<div class="lds-dual-ring"></div>

							<!-- recent posts -->
							<div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
								
                                @foreach ($research as $item)
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

							<!-- popular posts -->
							<div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                @foreach ($most_viewed_research as $item)
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
											<li class="list-inline-item"><a href="{{url('/authors/'.$item->editor->id)}}">{{$item->editor->name}}</a></li>
											<li class="list-inline-item">{{$item->views}} زيارة</li>
										</ul>
									</div>
								</div>
                                @endforeach

							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</section>