
@extends('front.app',['page_title'=>$article->title,'page_description'=>$article->meta_description,'page_image'=>$article->main_image()])

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
      <li class="breadcrumb-item"><a href="{{url('/'.$article->category->slug)}}">{{$article->category->title}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
  </ol>
</nav>
@endsection

@section('content')
<div class="col-lg-8">
  <!-- post single -->
  <div class="post post-single">
    <!-- post header -->
    <div class="post-header">
      <h1 class="title mt-0 mb-3">{{$article->title}}</h1>
      <ul class="meta list-inline mb-0">
        <li class="list-inline-item"><a href="{{url('/authors/'.$article->editor->slug)}}"><img src="{{$article->editor->avatar('thumb')}}" class="author" alt="{{$article->editor->name}}"/>{{$article->editor->name}}</a></li>
        <li class="list-inline-item"><a  href="{{url('/'.$article->category->slug)}}">{{$article->category->title}}</a></li>
        <li class="list-inline-item"> {{date_format($article->created_at,"Y-m-d")}}</li>
      </ul>
    </div>
    <!-- featured image -->
    <div class="featured-image">
      <img src="{{$article->main_image('original')}}" alt="{{$article->title}}" />
    </div>
    <!-- post content -->
    <div class="post-content clearfix">
      {!! $article->description!!}
    </div>

    <!-- post bottom section -->
    <div class="post-bottom">
      <div class="row d-flex align-items-center">
        <div class="col-md-6 col-12 text-center text-md-start">
          <!-- tags -->
          @foreach($article->tags as $tag)
            <a href="{{url('/tags/'.$tag->slug)}}" class="tag">#{{$tag->tag_name}}</a>
          @endforeach          
        </div>
        <div class="col-md-6 col-12">
          <!-- social icons -->
          <a href="{{$article->file_url}}" style="float: left" class="btn btn-default">تحميل</a>
        </div>
      </div>
    </div>

  </div>

  <div class="spacer" data-height="50"></div>

  <div class="about-author padding-30 rounded">
    <div class="thumb">
      <img src="{{$article->editor->avatar('thumb')}}" alt="{{$article->editor->name}}" />
    </div>
    <div class="details">
      <h4 class="name"><a href="{{url('authors/'.$article->editor->slug)}}">{{$article->editor->name}}</a></h4>
      <p>{{$article->editor->meta_description}}</p>
    </div>
  </div>

</div>
@endsection
