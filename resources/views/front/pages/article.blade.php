@extends('layouts.app',['page_title'=>$article->title,'page_description'=>$article->meta_description,'page_image'=>$article->main_image()])
@section('content')
<style type="text/css">
	.article img,iframe{
		max-width: 100%;
	}
  pre[class*=language-]{
    background: #24292e!important;
    border-radius: 10px!important;
  }
  code[class*=language-],code *{
    font-family: monospace!important;
  }
  code[class*=language-], pre[class*=language-]{
    white-space: pre!important;
  }
  .token.class-name, .token.constant, .token.property, .token.symbol {
      color: #79b8f2!important;
  }
  .token.entity, .token.operator, .token.url{
    color: #F97583!important;
  }
  .token.attr-value, .token.char, .token.regex, .token.string, .token.variable{
    color: #9ECBFF!important;
  }
  .token.boolean, .token.function, .token.number{
    color: #B392F0!important;
  }

</style>
<section class="wrapper bg-soft-primary">
      <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
          <div class="col-md-10 col-xl-8 mx-auto">
            <div class="post-header">
              <div class="post-category text-line">

              	@foreach($article->categories as $article_category)
                	@if($loop->index<5)
                		<a href="{{route('category.show',$article_category)}}" class="hover pe-2" rel="category">{{$article_category->title}}</a>
                	@endif
            	@endforeach
              </div>
              <!-- /.post-category -->
              <h1 class="display-1 mb-4">{{$article->title}}</h1>
              <ul class="post-meta mb-5">
                <li class="post-date font-1"><i class="fal fa-calendar-alt"></i><span> {{\Carbon::parse($article->created_at)->diffForHumans()}}</span></li>
                <li class="post-author font-1"><a href="{{route('blog',['user_id'=>$article->user->id])}}" class="font-1"><i class="fal fa-user"></i><span> {{$article->user->name}}</span></a></li>
                @if($article->comments_count!=0)
                <li class="post-comments"><a href="#comments"><i class="fal fa-comment"></i> {{$article->comments_count}}<span> تعليقات</span></a></li>
                @endif
                @if($article->views!=0)
                <li class="post-comments"><a href="#comments"><i class="fas fa-fa-thin fa-eyes"></i> {{$article->views}}<span> مشاهدة</span></a></li>
                @endif
                {{-- <li class="post-likes"><a href="#"><i class="uil uil-heart-alt"></i>3<span> Likes</span></a></li> --}}
              </ul>

              <div class="post-category text-line">
              	@foreach($article->tags as $article_tag)
                	@if($loop->index<5)
                		<a href="{{route('tag.show',$article_tag)}}" class="hover pe-2" rel="tag">#{{$article_tag->tag_name}}</a>
                	@endif
            	@endforeach
              </div>

              <!-- /.post-meta -->
            </div>
            <!-- /.post-header -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light article">
      <div class="container pb-14 pb-md-16 px-0">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="blog single mt-n17">
              <div class="card">
                <figure class="card-img-top"><img src="{{$article->main_image()}}" alt="" /></figure>
                <div class="card-body p-4 p-lg-9">
                  <div class="classic-view">
                  	<article class="post">
                  		{!!$article->description!!}
                  	</article>
                    <!-- /.post -->
                  </div>
                  <!-- /.classic-view -->
                  <hr />
                  <div class="col-12 p-0 text-center">
                  	
                  
                  <div class="author-info d-md-flex align-items-center mb-3 text-center col-12">
                    <div class="d-flex align-items-center row mx-auto">
                    	<div class="col-12 text-center d-flex align-items-center justify-content-center ">
                    		<figure class="user-avatar m-0"><a href="{{route('blog',['user_id'=>$article->user->id])}}" class="link-dark font-1"><img class="rounded-circle m-0" alt="" src="{{$article->user->getUserAvatar()}}" /></a></figure>
                    	</div>
                      	<div class="col-12 text-center d-flex align-items-center justify-content-center">
                     
                    
                        <h6><a href="{{route('blog',['user_id'=>$article->user->id])}}" class="link-dark font-1">{{$article->user->name}}</a></h6>
                      
                  </div>
                    </div>
                  </div>
                  </div>
                  <!-- /.author-info -->
                  <p class="text-center">{{$article->user->bio}}.</p>

                  @if($article->comments_count)
                  <hr />
                  <div id="comments">
                    <h3 class="mb-6">{{$article->comments_count}} التعليقات</h3>
                    <ol id="singlecomments" class="commentlist">
                    	@foreach($article->comments as $comment)
                      <li class="comment">
                        <div class="comment-header d-md-flex align-items-center">
                          <div class="d-flex align-items-center">

                            <figure class="user-avatar ms-2 me-0"><img class="rounded-circle" alt="" src="{{$comment->user==null?env('DEFAULT_IMAGE_AVATAR'):$comment->user->getUserAvatar()}}" style="width:40px;height:40px" /></figure>

                            <div>
                              <h6 class="comment-author"><a href="#" class="link-dark font-1">{{$comment->user==null?$comment->adder_name:$comment->user->name}}</a></h6>
                              <ul class="post-meta">
                                <li><i class="fal fa-calendar-alt"></i> {{\Carbon::parse($comment->created_at)->diffForHumans()}}</li>
                              </ul>
                            </div>
                          </div>
                          {{-- <div class="mt-3 mt-md-0 ms-auto">
                            <a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"> رد</a>
                          </div> --}}
                        </div>
                        <p>{{$comment->content}}</p>
                      </li>
                      @endforeach
                    </ol>
                  </div>
                  <hr />
                  @endif
                
                  <h3 class="mb-3">شاركنا رأيك</h3>
                  <p class="mb-7">بريدك الالكتروني لن يتم نشره.</p>
                  <form class="comment-form" method="POST" action="{{route('comment-post')}}">
                  	@csrf
                  	<input type="hidden" name="article_id" value="{{$article->id}}">
                  	@guest
                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" placeholder="الاسم*" id="c-name" name="adder_name">
                      <label for="c-name">الاسم *</label>
                    </div>
                    <div class="form-floating mb-4">
                      <input type="email" class="form-control" placeholder="البريد الإلكتروني*" id="c-email" name="adder_email">
                      <label for="c-email">البريد الإلكتروني*</label>
                    </div>
                    @endguest
                    <div class="form-floating mb-4">
                      <textarea name="content" class="form-control" placeholder="تعليقك" style="height: 150px"></textarea>
                      <label>تعليقك *</label>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill mb-0">اضافة تعليق</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('scripts')
<script type="text/javascript">
	Fancybox.bind('.post img', {
	  caption: function (fancybox, carousel, slide) {
	    return (
	      `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
	    );
	  },
	});
</script>
@endsection