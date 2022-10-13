@extends('layouts.app',['page_title'=>$article->title,'page_description'=>$article->meta_description,'page_image'=>$article->main_image()])
@section('content')
<style type="text/css">
	.article img,iframe{
		max-width: 100%;
	}
</style>
<section class="wrapper bg-soft-primary">
      <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
          <div class="col-md-10 col-xl-8 mx-auto">
            <div class="post-header">
              <div class="post-category text-line">
                <a href="#" class="hover" rel="category">{{implode(', ',$article->categories()->get()->pluck('title')->toArray() )}}</a>
              </div>
              <!-- /.post-category -->
              <h1 class="display-1 mb-4">{{$article->title}}</h1>
              <ul class="post-meta mb-5">
                <li class="post-date"><i class="fal fa-calendar-alt"></i><span> {{\Carbon::parse($article->created_at)->diffForHumans()}}</span></li>
                <li class="post-author"><a href="#"><i class="fal fa-user"></i><span> {{$article->user->name}}</span></a></li>
                {{-- <li class="post-comments"><a href="#"><i class="uil uil-comment"></i>3<span> Comments</span></a></li>
                <li class="post-likes"><a href="#"><i class="uil uil-heart-alt"></i>3<span> Likes</span></a></li> --}}
              </ul>
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
      <div class="container pb-14 pb-md-16">
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
                    		<figure class="user-avatar m-0"><img class="rounded-circle m-0" alt="" src="{{$article->user->getUserAvatar()}}" /></figure>
                    	</div>
                      	<div class="col-12 text-center d-flex align-items-center justify-content-center">
                     
                    
                        <h6><a href="#" class="link-dark">{{$article->user->name}}</a></h6>
                      
                  </div>
                    </div>
                  </div>
                  </div>
                  <!-- /.author-info -->
                  <p>{{$article->user->bio}}.</p>

                  {{-- <hr />
                  <div id="comments">
                    <h3 class="mb-6">5 التعليقات</h3>
                    <ol id="singlecomments" class="commentlist">
                      <li class="comment">
                        <div class="comment-header d-md-flex align-items-center">
                          <div class="d-flex align-items-center">
                            <figure class="user-avatar"><img class="rounded-circle" alt="" src="/assets/img/avatars/u1.jpg" /></figure>
                            <div>
                              <h6 class="comment-author"><a href="#" class="link-dark">بيتر ثروت</a></h6>
                              <ul class="post-meta">
                                <li><i class="fal fa-calendar-alt"></i> 14 Jan 2022</li>
                              </ul>
                            </div>
                          </div>
                          <div class="mt-3 mt-md-0 ms-auto">
                            <a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"> رد</a>
                          </div>
                        </div>
                        <p>نص عشوائي يمكن أن يستبدل في نفس المساحة.</p>
                      </li>
                    </ol>
                  </div>
                  <hr />
                  <h3 class="mb-3">شاركنا رأيك</h3>
                  <p class="mb-7">بريدك الالكتروني لن يتم نشره.</p>
                  <form class="comment-form">
                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" placeholder="الاسم*" id="c-name">
                      <label for="c-name">الاسم *</label>
                    </div>
                    <div class="form-floating mb-4">
                      <input type="email" class="form-control" placeholder="البريد الإلكتروني*" id="c-email">
                      <label for="c-email">البريد الإلكتروني*</label>
                    </div>
                    <div class="form-floating mb-4">
                      <textarea name="textarea" class="form-control" placeholder="تعليقك" style="height: 150px"></textarea>
                      <label>تعليقك *</label>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill mb-0">اضافة تعليق</button>
                  </form> --}}
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
	Fancybox.bind('.article img', {
	  caption: function (fancybox, carousel, slide) {
	    return (
	      `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
	    );
	  },
	});
</script>
@endsection