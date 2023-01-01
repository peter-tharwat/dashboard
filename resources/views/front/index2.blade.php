@extends('layouts.app')
@section('styles')
<style type="text/css">
	.hero-image {
		background-image:url('https://demo.ar-themes.com/bahr7/wp-content/uploads/sites/57/2020/09/26.06.2019-fut-1.jpg');
	    line-height: 0;
	    background-position: center;
	    -webkit-background-size: cover;
	    -moz-background-size: cover;
	    -o-background-size: cover;
	    background-size: cover;
	    height: 100%;
	    width: 100%;
	    position: absolute;
	    top: 0;
	    bottom: 0;
	    right: 0;
	    left: 0;
    	right: 0;
	}
	.hero-image:after{
		background: #000;
	    opacity: 0.4;
	    pointer-events: none;
	    position: absolute;
	    content: '';
	    width: 100%;
	    height: 100%;
	    top:0px;
	}
	.category-section{
		transition:0.3s all ease-in-out;
	}
	.category-section:hover{
		transform: translateY(-5px);
	    box-shadow: rgb(0 0 0 / 30%) 0 16px 16px 0;
	}
	.category-section::after{
		transition:all 0.2s ease-in-out;
		background: #000;
	    opacity: 0.4;
	    pointer-events: none;
	    position: absolute;
	    content: '';
	    width: 100%;
	    height: 100%;
	    top:0px;
	    
	}
	.category-section:hover::after{
		opacity:0.3!important;
	}
	.position-relative-inner *{
		position:relative;
	}
	.blog-style input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
	  color: #fff;
	  opacity: 1; /* Firefox */
	}
	.blog-style .hero-search-btn{
	    top: 8px;
	    border-radius: 50%;
	    width: 55px;
	    padding: 0px;
	    height: 55px;
	}
	body{
		background:#fff!important;
	}
	.footer-cta{
		display:none;
	}
	#footer{
		padding-top:60px!important;
	}
</style>
@endsection
@section('content')
<div class="blog-style">
<div class="col-12 p-0 " style="height:400px;position: relative;">
	<div class="col-12 hero-image"></div>
	<div class="col-12 p-2 position-relative-inner d-flex align-items-center justify-content-center h-100" >
		<div class="col-12 p-0 d-flex row m-0">
		<h3 class="text-center pt-6 font-3 font-lg-6 " style="color:#fff;z-index: 1;position: relative;" >من خلال مدونة عالم المعرفة يمكنك الاستمتاع بقراءة مواضيع رائعة</h3>
		<form method="GET" action="{{route('blog')}}" class="position-relative d-flex mx-auto mt-3 justify-content-between" style="width: 600px;max-width: 90%;">
			<input type="text" name="" class="form-control  mx-auto font-2" style="background: rgb(255 255 255 / 52%);box-shadow: none;border-radius: 50px;color: #fff;padding: 20px 40px;box-shadow: 0 1px 1px rgb(0 0 0 / 5%);border-color: #D0D0D0;" placeholder="ابحث عبر المنصة">
			<div class="col-12 d-flex position-absolute justify-content-end" style="width:100%;height:0px;padding: 0px 41px;">
				<button class="btn btn-success hero-search-btn" ><span class="fal fa-search"></span></button>
			</div>
			
		</form>
		</div>
	</div>
</div>
<div class="col-12 py-12 p-0">
	<div class="container p-0">
		
	
	<div class="col-12 p-3 row d-flex justify-content-center">
		<div class="col-12 text-center display-4 mb-12">
			الأقسام
		</div>
		@php
		$categories = \App\Models\Category::orderBy('id','ASC')->get();
		@endphp
		@foreach($categories as $category)
		<div class="col-12 col-md-6 col-lg-4 p-2 my-lg-3 ">
			<a href="{{route('category.show',$category)}}">
			<div class="col-12 p-0 category-section position-relative d-flex align-items-center justify-content-center font-3 font-lg-5 rounded" style="height:200px;overflow: hidden;">
				<div style="background-image:url('{{$category->image()}}');padding: 20px;height: 100%;background-size: cover;background-position: center;border-radius: 8px;color: #fff;width: 100%;position: absolute;"></div>
				<div style="z-index:1;color:#fff;font-weight:bold;">{{$category->title}}</div>
			</div>
			</a>
		</div>
		@endforeach


	</div>
	</div>
</div>
</div>
@endsection