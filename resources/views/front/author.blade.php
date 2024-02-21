@extends('front.app',['page_title'=>$author->name,'page_description'=>$author->meta_description,'page_image'=>$author->avatar()])

@section('content')
<div class="col-lg-8">
  <div class="row gy-4">
    <div class="about-author padding-30 rounded">
      <div class="thumb">
        <img src="{{$author->avatar('tiny')}}" alt="{{$author->name}}" />
      </div>
      <div class="details">
        <h4 class="name"><a href="{{url('authors/'.$author->slug)}}">{{$author->name}}</a></h4>
        <p>{{$author->meta_description}}</p>
        <!-- social icons -->
      </div>
    </div>

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