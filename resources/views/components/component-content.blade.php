<div class="col-12 p-0 row">
    @if($component_content['view_type'] == "standard" )
    <div class="col-12 p-0 row">
      @foreach( $contents as $inside_content)
      <div class="col-12 col-md-6 col-lg-{{ 12/$component_content['design_columns'] }} mt-2 p-2">
            <div class="p-1 swiper-slide text-center d-flex align-items-center justify-content-center ">
              <a href="{{$inside_content['url']??"#"}}" class="p-0 col-12" style="color:inherit;">
                <div class="col-12 p-2 row" style="border:1px solid rgb(141 141 141 / 14%);border-radius: 5px;">
                    <div class="p-0" style="background-image: url('{{$inside_content['image']}}');background-repeat: no-repeat;background-position: center;background-size: cover;max-height: {{$component_content['design_min_height']}}dvh;border-radius: 8px;position: relative;overflow: hidden;" >
                            <img src="{{$inside_content['image']}}" style="width: 100%;border-radius: 8px;opacity: 0;" />
                    </div>
                    <div class="d-flex align-items-center justify-content-center p-0">
                        <div class="col-12 p-2 ">
                            <div class="font-2  col-12 mb-1" style="color:inherit;">{{$inside_content['title']}}</div>
                            <div class="font-1 col-12  text-truncate" style="color:inherit;opacity: 0.8">{{ strip_tags(mb_strimwidth($inside_content['description'],0,100,'..'))}}</div>
                        </div>
                    </div>
                </div>
              </a>
            </div>
      </div>
      @endforeach
    </div>
    @elseif($component_content['view_type'] == "slider" )
    <div class="col-12 p-0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <div class="col-12 swiper swiper-{{$component_content['id']}} mx-auto swiper-container swiper-auto" data-margin="30" data-dots="true" data-nav="true" data-centered="true" data-loop="true" data-items-auto="true" data-effect="cards" style="border-radius:8px;overflow: hidden;">
            <div class="shape bg-dot yellow rellax w-18 h-18" data-rellax-speed="1"></div>
            <div class="shape rounded-circle bg-line green rellax w-16 h-16" data-rellax-speed="1" style="bottom: -0.5rem; left: -1.4rem;"></div>
            <div class="swiper-wrapper">
                @foreach( $contents as $inside_content)
                <div class="p-1 swiper-slide text-center d-flex align-items-center justify-content-center ">
                  <a href="{{$inside_content['url']??"#"}}" class="p-0 col-12" style="color:inherit;">
                    <div class="col-12 p-2 row" style="border:1px solid rgb(141 141 141 / 14%);border-radius: 5px;">
                        <div class="p-0" style="background-image: url('{{$inside_content['image']}}');background-repeat: no-repeat;background-position: center;background-size: cover;max-height: {{$component_content['design_min_height']}}dvh;border-radius: 8px;position: relative;overflow: hidden;" >
                                <img src="{{$inside_content['image']}}" style="width: 100%;border-radius: 8px;opacity: 0;" />
                        </div>
                        <div class="d-flex align-items-center justify-content-center p-0">
                            <div class="col-12 p-2 ">
                                <div class="font-2  col-12 mb-1" style="color:inherit;">{{$inside_content['title']}}</div>
                                <div class="font-1 col-12  text-truncate" style="color:inherit;opacity: 0.8">{{ strip_tags(mb_strimwidth($inside_content['description'],0,100,'..'))}}</div>
                            </div>
                        </div>
                    </div>
                  </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <script type="text/javascript">
        new Swiper(".swiper-{{$component_content['id']}}", {
            initialSlide: 0,
            grabCursor: true,
            pauseOnMouseEnter: true,
            autoplay: { delay: 3000, },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                1000: {
                    slidesPerView: "{{ $component_content['design_columns'] }}",
                    spaceBetween: 20
                }
            }
        });

        </script>
    </div>
    @endif               
    @if($items != null && $component_content['paginate'] == "true")
    <div class="col-12 p-0 d-flex {{$component_content['design_text_alignment']}}">
      {{$items->links()}}
    </div>
    @endif
</div>