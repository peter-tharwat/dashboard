
@extends('front.app',['page_title'=>$page->title,'page_description'=>$page->meta_description,'page_image'=>$page->image()])

@section('header-section')
<section class="page-header">
  <div class="container-xl">
      <div class="text-center">
          <h1 class="mt-0 mb-2">{{$page->title}}</h1>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center mb-0">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
              </ol>
          </nav>
      </div>
  </div>
</section>
@endsection

@section('content')
<div class="col-lg-8">
  <!-- post single -->
  <div class="post post-single">

    <!-- post content -->
    <div class="post-content clearfix">
      {!! $page->description!!}
    </div>

    <!-- post bottom section -->
    <div class="post-bottom">
      <div class="row d-flex align-items-center">
        <div class="col-md-6 col-12">
          <!-- social icons -->
          @include('front.partials.home.social-icons')
        </div>
      </div>
    </div>

  </div>


</div>
@endsection
