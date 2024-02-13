@extends('front.app',['page_title'=>'الكتاب'])


@section('header-section')
<section class="page-header">
  <div class="container-xl">
      <div class="text-center">
          <h1 class="mt-0 mb-2">الكتاب</h1>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page">الكتاب</li>
              </ol>
          </nav>
      </div>
  </div>
</section>
@endsection

@section('content')
<div class="col-lg-8">

  <div class="row gy-4">
    @foreach($authors as $author)
     <div class="about-author padding-30 rounded">
        <div class="thumb">
          <img src="{{$author->avatar('thumb')}}" alt="{{$author->name}}" />
        </div>
        <div class="details">
          <h4 class="name"><a href="{{url('authors/'.$author->slug)}}">{{$author->name}}</a></h4>
          <p>{{$author->meta_description}}</p>
        </div>
      </div>
    @endforeach
  </div>

  {{ $authors->links('front.custom-pagination') }}

</div>
@endsection