@extends('layouts.app',['title'=>"الرئيسية"])
@section('content')
@php
$page = \App\Models\Page::where('home',1)->firstOrFail();
@endphp
<div class="col-12 p-0 ">
    @if(is_countable(json_decode($page->content,true)))
    @foreach(json_decode($page->content,true) as $component)
    @include('components.page',['page'=>$page,'component'=>$component])
    @endforeach
    @endif
</div>
{{-- <style type="text/css">


</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<div class="container p-3 mt-5">
    <div class="swiper default-swiper col-12 mx-auto swiper-container swiper-auto" data-margin="30" data-dots="true" data-nav="true" data-centered="true" data-loop="true" data-items-auto="true" data-effect="cards" >
        <div class="shape bg-dot yellow rellax w-18 h-18" data-rellax-speed="1"></div>
        <div class="shape rounded-circle bg-line green rellax w-16 h-16" data-rellax-speed="1" style="bottom: -0.5rem; left: -1.4rem;"></div>
        <div class="swiper-wrapper">
            <div class="col-6 swiper-slide text-center d-flex align-items-center justify-content-center home-slide-container ">
                <a href="https://www.instagram.com/oneline.eg" class="p-0">
                    <img src="https://oneline.fra1.digitaloceanspaces.com/18/conversions/1000114361-original.webp" style />
                </a>
            </div>
            <div class="col-6 swiper-slide text-center d-flex align-items-center justify-content-center home-slide-container ">
                <a href="https://www.instagram.com/oneline.eg" class="p-0">
                    <img src="https://oneline.fra1.digitaloceanspaces.com/19/conversions/1000114362-original.webp" style />
                </a>
            </div>
            <div class="col-6 swiper-slide text-center d-flex align-items-center justify-content-center home-slide-container ">
                <a href="https://www.instagram.com/oneline.eg" class="p-0">
                    <img src="https://oneline.fra1.digitaloceanspaces.com/20/conversions/1000114363-original.webp" style />
                </a>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<script type="text/javascript">
        new Swiper(".default-swiper", {
            initialSlide: 1,
            autoplay: {
			    delay: 3000,
			 },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                1000: {
                    slidesPerView: 1,
                    spaceBetween: 20
                }
            }
        });
    </script> --}}
@endsection
