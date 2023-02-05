@extends('layouts.app',['page_title'=>"المدونة"])
@section('content')
<div class="col-12 p-0  bg-light pt-6">

	<section class="section-frame overflow-hidden">
	      <div class="wrapper bg-soft-primary">
	        <div class="container py-12 py-md-10 text-center">
	          <div class="row">
	            <div class="col-md-7 col-lg-6 col-xl-5 mx-auto">
	              <h1 class="display-1 mb-3 text-center">المدونة</h1>
	              <p class="lead px-lg-5 px-xxl-8 mb-1 text-center">إليك أحدث مقالاتنا.</p>
	            </div>
	            <!-- /column -->
	          </div>
	          <!-- /.row -->
	        </div>
	        <!-- /.container -->
	      </div>
	      <!-- /.wrapper -->
	    </section>


	<div class=" p-0 container py-10 " style="min-height:70vh">
		<div class="col-12 p-2 p-lg-3 row">

			<div class="col-12 p-2 row">
				@foreach($articles as $article)


				<div class="col-12 col-lg-4 mb-4">
		            <article>
		              <div class="card shadow-lg">
		                <figure class="card-img-top overlay overlay-1"><a href="{{route('article.show',$article)}}"> <img src="{{$article->main_image()}}" alt="" style="height:280px;object-fit: cover;vertical-align: middle;" /></a>
		                  <figcaption>
		                    <h5 class="from-top mb-0 text-center">عرض المزيد</h5>
		                  </figcaption>
		                </figure>
		                <div class="card-body p-6">
		                  <div class="post-header">
		                    <div class="post-category">
		                    	@foreach($article->categories as $article_category)
			                    	@if($loop->index<3)
			                    		<a href="{{route('category.show',$article_category)}}" class="hover" rel="category">{{$article_category->title}}</a>
			                    	@endif
		                    	@endforeach
		                      
		                    </div>
		                    <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{route('article.show',$article)}}">{{$article->title}}</a></h2>
		                  </div>
		                  <div class="post-footer">
		                    <ul class="post-meta d-flex mb-0">
		                      <li class="post-date"> 
		                      	<span> 
		                      		<i class="fal fa-clock"></i>  {{\Carbon::parse($article->created_at)->diffForHumans()}}
		                      	</span> 
		                      </li>
		                      @if($article->comments_count==null || $article->comments_count ==0)
		                      <li class="post-comments"><a href="#">  {{$article->comments_count}} <i class="fal fa-comment"></i> </a></li>
		                      @endif
		                    </ul>
		                  </div>
		                </div>
		              </div>
		            </article>
		          </div> 
				@endforeach

				<div class="col-12 p-2">
					{{$articles->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection