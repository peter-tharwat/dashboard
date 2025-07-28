<div class="col-12 p-0 row">
    <div class="col-12 p-0 ">
        @php
        $component_content = \MainHelper::arrayToObject($component_content);
        @endphp
        @if($component_content->view_type == "slider" )
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        @endif
        <div class="col-12 swiper swiper-{{$component_content->id}} swiper-container swiper-auto mx-auto " data-margin="30" data-dots="true" data-nav="true" data-centered="true" data-loop="true" data-items-auto="true" data-effect="cards" style="border-radius:8px;overflow: hidden;">
            <div class="shape bg-dot yellow rellax w-18 h-18" data-rellax-speed="1"></div>
            <div class="shape rounded-circle bg-line green rellax w-16 h-16" data-rellax-speed="1" style="bottom: -0.5rem; left: -1.4rem;"></div>
            <div class="col-12 p-0 {{$component_content->view_type == "slider" ? 'swiper-wrapper':'row'}}" style="position:relative;z-index: 1;display: flex;align-items: flex-start;">
                @foreach( $contents as $inside_content)

                <div class="p-1 {{$component_content->view_type == "slider" ? 'swiper-slide':'col-' . (12/$component_content->design_columns_mobile) .' col-lg-'. 12/$component_content->design_columns . ' mt-2 p-2'}}  text-center d-flex align-items-center justify-content-center ">
                    <a href="{{$inside_content['url']??"#"}}" class="p-0 col-12" style="color:inherit;">
                        <div class="col-12 p-0 row overflow-hidden card">
                            <div class="p-0 position-relative component-content-image-container" style=";background-repeat: no-repeat;background-position: center;background-size: cover;position: relative;overflow: hidden;">
                                <img loading="lazy" src="{{$inside_content['image']}}" style="width: 100%;max-height: 375px;object-fit: cover;" />

                                <div class="col-12 px-2 d-flex justify-content-end" style="position:absolute;bottom: 10px;">
                                    @if(isset($inside_content['quantity']) && $inside_content['quantity'] == 0)
                                    <span style="color: #fff;background-color: #193847;display:inline-block;padding: 0px 6px;border-radius:6px" class="font-small mx-1">نفذت الكمية</span>
                                    @endif
                                    @if(isset($inside_content['sales_price']) && isset($inside_content['price']) && $inside_content['sales_price'] > $inside_content['price'])
                                    <span style="color: #fff;background-color: #ed3a01;display:inline-block;padding: 0px 6px;border-radius:6px" class="font-small mx-1">{{sprintf('%0.0f',($inside_content['sales_price']-$inside_content['price'])*100/($inside_content['sales_price']))}}%-</span>
                                    @endif
                                </div>


                            </div>
                            <div class="p-2 p-lg-3 d-flex align-items-center justify-content-center p-0">
                                <div class="col-12 p-0 ">
                                    <div class="font-1 font-lg-2 col-12 mb-1" style="color:inherit;font-weight:bold">{{$inside_content['title']}}</div>
                                    @if($inside_content['description'] !="")
                                    <div class="font-1 col-12  text-truncate" style="color:inherit;opacity: 0.8">{{ strip_tags(mb_strimwidth($inside_content['description'],0,100,'..'))}}</div>
                                    @endif

                                    @if(isset($inside_content['price']))
                                    <div class="col-12 p-0 row" style="font-weight: bold;">
                                    




                                        @if($inside_content['price'] == 0)
                                        <div class="col-auto p-0" style="color: {{$settings->get('colors.primary')}};">
                                            مجاناً
                                        </div>
                                        @else
                                        <div class="col-auto p-0" style="color: {{$settings->get('colors.primary')}};">
                                            {{$inside_content['price']}}
                                          
                                            <span class="font-1">{{$website->currency()}}</span>
                                         
                                        </div>
                                        @endif

                                        @if(isset($inside_content['sales_price']))
                                        &nbsp;&nbsp;
                                        <div class="col-auto p-0">
                                            <span style="text-decoration: line-through!important;text-decoration-thickness: 2px!important;font-weight: normal;line-height: 0px">{{$inside_content['sales_price']}}
                                              
                                            </span>
                                        </div>
                                        @endif





                                        

                                    </div>
                                    @endif


                                    @if(isset($inside_content['stars']) && 
                                    ($inside_content['stars']!= 0 && $inside_content['stars']!= "")
                                    )
                                    <div class="col-auto p-0 card-reviews">
                                        @include('components.stars',['score'=>$inside_content['stars'],'size'=>11])
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @if($component_content->view_type == "slider" )
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            @endif
        </div>
    </div>

    @if($items != null && $component_content->paginate == "true")
    <div class="col-12 py-2 d-flex ">
        {{-- {{$component_content->component_content}} --}}
        {{$items->links()}}
    </div>
    @endif


</div>
@if($component_content->view_type == "slider" )
<script type="text/javascript">
new Swiper(".swiper-{{$component_content->id}}", {
    initialSlide: 0,
    loop: true,
    grabCursor: true,
    pauseOnMouseEnter: true,
    autoplay: { delay: 3000, },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', },
    breakpoints: {
        0: {
            slidesPerView: "{{ $component_content->design_columns_mobile }}",
            spaceBetween: 15
        },
        1000: {
            slidesPerView: "{{ $component_content->design_columns }}",
            spaceBetween: 20
        }
    }
});
</script>
@endif
