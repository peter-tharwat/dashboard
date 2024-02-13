@extends('front.app',['page_title'=>$category->title,'page_description'=>$category->meta_description,'page_image'=>$category->image()])

@isset($search_word)
<script>
  $(document).ready(function(){
    $(".community-post").mark('{{$search_word}}');
  });
</script>
@endisset


@section('header-section')
<section class="page-header">
  <div class="container-xl">
      <div class="text-center">
          <h1 class="mt-0 mb-2">{{$category->title}}</h1>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
              </ol>
          </nav>
      </div>
  </div>
</section>
@endsection

@section('content')
<div class="col-lg-8">

  <div class="row gy-4">
    @foreach($posts as $post)
      <div class="col-sm-6">
          <!-- post -->
          <div class="post post-grid rounded bordered">
              <div class="thumb top-rounded">
                <a href="{{url('/'.$post->category->slug)}}" class="category-badge position-absolute">{{$post->category->title}}</a>
                <a href="blog-single.html">
                      <div class="inner">
                          <img style="width: 100%;" src="{{$post->main_image('thumb')}}" alt="post-title" />
                      </div>
                  </a>
              </div>
              <div class="details">
                  <ul class="meta list-inline mb-0">
                      <li class="list-inline-item"><a href="{{url('authors/'.$post->editor->slug)}}"><img src="{{$post->editor->avatar('tiny')}}" class="author" alt="author"/>{{$post->editor->name}}</a></li>
                      <li class="list-inline-item">{{date_format($post->created_at,"Y-m-d")}}</li>
                  </ul>
                  <h5 class="post-title mb-3 mt-3"><a href="{{url($post->category->slug.'/'.$post->slug)}}">{{$post->title}}</a></h5>
                  <p class="excerpt mb-0">{{$post->meta_description}}</p>
              </div>
              <div class="post-bottom clearfix d-flex align-items-center">
                  <div class="social-share me-auto">
                      <button class="toggle-button icon-share"></button>
                  </div>
                  <div class="more-button float-end">
                      <a href="#"><span class="icon-options"></span></a>
                  </div>
              </div>
          </div>
      </div>
    @endforeach
  </div>

  {{ $posts->links('front.custom-pagination') }}

</div>
@endsection