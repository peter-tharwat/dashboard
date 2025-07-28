<div class="col-12 p-0 row">
    <div style="position:relative;" class="content-block block_{{$component->fields?->id}} px-0" id="block_{{$component->fields?->id}}">
        <div class='position-relative  border-0 hoverable-elements-builder appened-element' style="color:{{$component->fields?->design_text_color}}">

            <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 0;background-size:cover;background-repeat:no-repeat;background-position:center; @if($component->fields->design_background_color !=null )background-color:{{$component->fields->design_background_color}};@endif @if($component->fields->design_background_url!=null) background-image:  url('{{$component->fields->design_background_url}}') @endif ;
              opacity: {{$component->fields->design_background_opacity}};
              filter: blur({{$component->fields->design_background_blur}}px) grayscale({{$component->fields->design_background_grayscale}}%);"></div>


            <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 0;background-size:cover;background: #000;opacity: {{$component->fields->design_background_black}}"></div>

            <div class='main-content-of-block py-5 py-lg-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component->fields->design_min_height}}dvh">
                @if($component->fields->block_type == "component_cta")
                <div class="container px-3">
                    <div class='col-12 mx-auto {{$component->fields->design_text_alignment}} row'>
                        @if($component->fields->content_title!="")
                        <h2 class='font-3 font-lg-5 mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_sub_title!="")
                        <p class=' mb-3 mb-lg-5  font-2 font-lg-3 content_sub_title  {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                        @endif
                        @if($component->fields->content_description!="")
                        <p class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description {{$component->fields->design_text_alignment}}' style="white-space: pre-line;opacity: 0.9">{{$component->fields->content_description}}</p>
                        @endif
                        <div class="col-12 px-0 d-flex btns-group mt-2 {{$component->fields->design_text_alignment}}">
                            @foreach($component->fields->buttons as $button)
                            <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button->fields->class}}" href="{{$button->fields->url??'#'}}" target="{{$button->fields->url_open_type}}" style="border-radius: 3px;">
                                {{$button->fields->title}}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_banner")
                <div class="container px-3">
                    <div class='col-12 mx-auto {{$component->fields->design_text_alignment}} row'>
                        @if($component->fields->content_title!="")
                        <h2 class='font-3 font-lg-5 mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_sub_title!="")
                        <p class=' mb-3 mb-lg-5  font-2 font-lg-3 content_sub_title  {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                        @endif
                        @if($component->fields->content_description!="")
                        <p class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description {{$component->fields->design_text_alignment}}' style="white-space: pre-line;opacity: 0.9">{{$component->fields->content_description}}</p>
                        @endif
                        @if($component->fields->buttons != null)
                        <div class="col-12 px-0 d-flex btns-group mt-2 {{$component->fields->design_text_alignment}}">
                            @foreach($component->fields->buttons as $button)
                            <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button->fields->class}}" href="{{$button->fields->url??'#'}}" target="{{$button->fields->url_open_type}}" style="border-radius: 3px;">
                                {{$button->fields->title}}
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_text")
                <div class="container px-3">
                    <div class='col-12 mx-auto {{$component->fields->design_text_alignment}} row'>
                        @if($component->fields->content_title!="")
                        <h2 class='font-3 font-lg-5 mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_sub_title!="")
                        <p class=' mb-3 mb-lg-5  font-2 font-lg-3 content_sub_title  {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                        @endif
                        @if($component->fields->content_description!="")
                        <p class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description {{$component->fields->design_text_alignment}}' style="white-space: pre-line;opacity: 0.9">{{$component->fields->content_description}}</p>
                        @endif
                        @if($component->fields->buttons != null)
                        <div class="col-12 px-0 d-flex btns-group mt-2 {{$component->fields->design_text_alignment}}">
                            @foreach($component->fields->buttons as $button)
                            <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button->fields->class}}" href="{{$button->fields->url??'#'}}" target="{{$button->fields->url_open_type}}" style="border-radius: 3px;">
                                {{$button->fields->title}}
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_text_with_image")
                <div class="container px-3">
                    <div class=' mx-auto row {{$component->fields->design_text_alignment}} {{$component->fields->design_content_alignment}}'>
                        <div class="col-12 col-lg-6 mx-auto text-center">
                            <img src="{{$component->fields->content_image_url}}" style="max-width:100%;border-radius: 8px;">
                        </div>
                        <div class="col-12 col-lg-6 d-flex align-items-center row mx-auto">
                            <div class="col-12 px-0 py-3 row ">
                                @if($component->fields->content_title!="")
                                <h2 class='font-3 font-lg-5 mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                                @endif
                                @if($component->fields->content_sub_title!="")
                                <p class=' mb-3 mb-lg-5  font-2 font-lg-3 content_sub_title  {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                                @endif
                                @if($component->fields->content_description!="")
                                <p class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description {{$component->fields->design_text_alignment}}' style="white-space: pre-line;opacity: 0.9">{{$component->fields->content_description}}</p>
                                @endif
                                @if($component->fields->buttons != null)
                                <div class="col-12 px-0 d-flex btns-group mt-2 {{$component->fields->design_text_alignment}}">
                                    @foreach($component->fields->buttons as $button)
                                    <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button->fields->class}}" href="{{$button->fields->url??'#'}}" target="{{$button->fields->url_open_type}}" style="border-radius: 3px;">
                                        {{$button->fields->title}}
                                    </a>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_text_with_video")
                <div class="container px-3">
                    <div class="{{$component->fields->design_text_alignment}} {{$component->fields->design_content_alignment}} mx-auto row">
                        <div class="col-12 col-lg-6 mx-auto">
                            <iframe src="{{\MainHelper::convert_to_embed($component->fields->content_video_url)}}" style="width:100%;height: 100%;border-radius: 10px;"></iframe>
                        </div>
                        <div class="col-12 col-lg-6 d-flex align-items-center row mx-auto">
                            <div class="col-12 px-0 py-3 row ">
                                @if($component->fields->content_title!="")
                                <h2 class='font-3 font-lg-5 mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                                @endif
                                @if($component->fields->content_sub_title!="")
                                <p class=' mb-3 mb-lg-5 content_sub_title  font-2 font-lg-3 block-sub-title {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                                @endif
                                @if($component->fields->content_description!="")
                                <p class=' mb-3 mb-lg-5 content_description font-1 font-lg-2 block-sub-title {{$component->fields->design_text_alignment}}' style="white-space: pre-line;opacity: 0.9">{{$component->fields->content_description}}</p>
                                @endif
                                @if($component->fields->buttons != null)
                                <div class="col-12 px-0 d-flex btns-group mt-2 {{$component->fields->design_text_alignment}}">
                                    @foreach($component->fields->buttons as $button)
                                    <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button->fields->class}}" href="{{$button->fields->url??'#'}}" target="{{$button->fields->url_open_type}}" style="border-radius: 3px;">
                                        {{$button->fields->title}}
                                    </a>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_features")
                <div class="container px-3">
                    <div class='{{$component->fields->design_text_alignment}} {{$component->fields->design_content_alignment}} row'>
                        @if($component->fields->content_title!="")
                        <h2 class='font-3 font-lg-5 content_title mb-lg-3 mb-1 block-head {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_description!="")
                        <p class=' mb-3 mb-lg-5 content_description font-1 font-lg-2 block-sub-title {{$component->fields->design_text_alignment}}' style="opacity: 0.9;white-space: pre;">{{$component->fields->content_description}}</p>
                        @endif
                        <div class="col-12 px-0 d-flex features-group row {{$component->fields->design_text_alignment}} {{$component->fields->design_content_alignment}}">
                            @foreach($component->fields->features as $feature)
                            <div class="p-1 p-lg-3 mx-auto col-{{12/$component->fields->design_columns_mobile}} col-lg-{{12/$component->fields->design_columns}} my-3">
                                @if($feature->fields->url != "")
                                <a href="{{$feature->fields->url}}" class="col-12 p-0 row" target="{{$feature->fields->url_open_type}}" style="color:inherit;">
                                    @endif
                                    <div class="col-12 mb-1 px-lg-2 px-1 text-center">
                                        <img src="{{$feature->fields->image_url}}" style="width:100px;max-width:90%">
                                    </div>
                                    <div class="col-12 font-2 font-lg-3 mb-1 px-2 text-center">
                                        {{$feature->fields->title}}
                                    </div>
                                    <div class="col-12 px-1 px-lg-2 text-center font-1 font-lg-2" style="font-size:15px;opacity:0.9;white-space: pre-line;">{{$feature->fields->content}}</div>
                                    @if($feature->fields->url != "")
                                </a>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_faqs")
                <div class="container px-3">
                    <div class='{{$component->fields->design_text_alignment}} row'>
                        @if($component->fields->content_title!="")
                        <h2 class='font-3 font-lg-5  mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_sub_title!="")
                        <p class=' mb-3 mb-lg-5 content_sub_title  font-2 font-lg-3 block-sub-title {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                        @endif
                        <div class="col-12 px-0 d-flex faqs-group row {{$component->fields->design_text_alignment}}">
                            <div class="col-12 px-3 mb-3 accordion">
                                @foreach($component->fields->faqs as $faq)
                                <div class="col-12 px-0 py-1">
                                    <div class="accordion-item mb-1" style="border:1px solid #e7e7ec!important;background: transparent;box-shadow: 0 .5rem .937rem #8c98a41a!important;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button font-1 font-lg-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$faq?->id}}" aria-controls="#collapse_{{$faq?->id}}" style="background-color:transparent;padding: 20px;font-weight: bold;text-align: start;color:{{$component->fields?->design_text_color}}">
                                                {{$faq->fields->title}}
                                            </button>
                                        </h2>
                                        <div id="collapse_{{$faq?->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="border-top:1px solid #e7e7ec!important;background-color: transparent;">
                                            <div class="accordion-body p-3 row">
                                                <div class="col-12 px-2 font-1 font-lg-2" style="opacity:0.9;color:{{$component->fields?->design_text_color}}">
                                                    {{$faq->fields->content}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_html")
                <div class="container px-3">
                    <div class='{{$component->fields->design_text_alignment}} row'>
                        @if($component->fields->content_title!="")
                        <h2 class='font-3 font-lg-5  mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_sub_title!="")
                        <p class=' mb-3 mb-lg-5  font-2 font-lg-3 content_sub_title  {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                        @endif
                        @if($component->fields->content_description!="")
                        <p class=' mb-3 mb-lg-5  font-1 font-lg-2 content_description {{$component->fields->design_text_alignment}}' style="opacity: 0.9;white-space: pre;">{{$component->fields->content_description}}</p>
                        @endif
                        <div class="col-12 p-0">{!!$component->fields->content_html!!}</div>
                        <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                    </div>
                </div>
                @endif
                @if($component->fields->block_type == "component_contact")
                <div class="container px-3">
                    <div class='{{$component->fields->design_text_alignment}} row'>
                        @if($component->fields->content_title!="")
                        <h2 class='font-3 font-lg-5  mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_sub_title!="")
                        <p class=' mb-3 mb-lg-5  font-2 font-lg-3 content_sub_title  {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                        @endif
                        <div class="col-12 col-lg-8 py-5 px-1 ">
                            @include('components.contact')
                        </div>
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_slider")
                <div class="container px-3">
                    <div class='{{$component->fields->design_text_alignment}} row'>
                        @if($component->fields->content_title !=null)
                        <h2 class='font-3 font-lg-5  mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_sub_title !=null)
                        <p class='mb-3 mb-lg-5  font-2 font-lg-3 content_sub_title  {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                        @endif
                        <div class="col-12 py-0 px-1 ">
                            <div class="col-12 p-0">
                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
                                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                                <div class="col-12 swiper swiper-{{$component->fields?->id}} mx-auto swiper-container swiper-auto" data-margin="30" data-dots="true" data-nav="true" data-centered="true" data-loop="true" data-items-auto="true" data-effect="cards" style="border-radius:8px;overflow: hidden;">
                                    <div class="shape bg-dot yellow rellax w-18 h-18" data-rellax-speed="1"></div>
                                    <div class="shape rounded-circle bg-line green rellax w-16 h-16" data-rellax-speed="1" style="bottom: -0.5rem; left: -1.4rem;"></div>
                                    <div class="swiper-wrapper">
                                        @foreach( ($component->fields->features) as $feature)
                                        <div class="swiper-slide text-center d-flex align-items-center justify-content-center  " style="background-image: url('{{$feature->fields->image_url}}');background-repeat: no-repeat;background-position: center;background-size: cover;border-radius: 8px;position: relative;overflow: hidden;">
                                            @if($feature->fields->url!=null)
                                            <a href="{{$feature->fields->url??"#"}}" target="{{$feature->fields->url_open_type}}" class="p-0 col-12">
                                                @endif
                                                @if($feature->fields->title !="" || $feature->fields->content !="")
                                                <div style="position: absolute;top: 0px;bottom: 0px;width: 100%;right: 0px;left: 0px;background: rgb(0 0 0 / 10%);" class="d-flex align-items-center justify-content-center row">
                                                    <div class="col-12 p-3">
                                                        <div class="font-3 font-lg-5 col-12 p-1 text-center" style="color:#fff">{{$feature->fields->title}}</div>
                                                        <div class="col-12 p-1 text-center" style="color:#fff">{{$feature->fields->content}}</div>
                                                    </div>
                                                </div>
                                                @endif
                                                <img src="{{$feature->fields->image_url}}" style="width: 100%;border-radius: 8px;opacity: 0;" />
                                                @if($feature->fields->url!=null)
                                            </a>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <script type="text/javascript">
                                new Swiper(".swiper-{{$component->fields?->id}}", {
                                    initialSlide: 0,
                                    loop: true,
                                    grabCursor: true,
                                    pauseOnMouseEnter: true,
                                    autoplay: { delay: 3000, },
                                    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev', },
                                    breakpoints: {
                                        0: {
                                            slidesPerView: "{{ $component->fields->design_columns_mobile }}",
                                            spaceBetween: 15
                                        },
                                        1000: {
                                            slidesPerView: "{{ $component->fields->design_columns }}",
                                            spaceBetween: 20
                                        }
                                    }
                                });

                                </script>
                            </div>
                            @if($component->fields->buttons != null)
                            <div class="col-12 px-0 d-flex btns-group mt-2 {{$component->fields->design_text_alignment}}">
                                @foreach($component->fields->buttons as $button)
                                <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button->fields->class}}" href="{{$button->fields->url??'#'}}" target="{{$button->fields->url_open_type}}" style="border-radius: 3px;">
                                    {{$button->fields->title}}
                                </a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
                @if($component->fields->block_type == "component_content")
                <div class="container px-3">
                    <div class='{{$component->fields->design_text_alignment}} row'>
                        @if($component->fields->content_title !=null)
                        <h2 class='font-3 font-lg-5  mb-lg-3 mb-1 content_title {{$component->fields->design_text_alignment}}' style="color:inherit;">{{$component->fields->content_title}}</h2>
                        @endif
                        @if($component->fields->content_sub_title !=null)
                        <p class=' mb-3 mb-lg-5  font-2 font-lg-3 content_sub_title  {{$component->fields->design_text_alignment}} ' style="opacity: 0.9;white-space:pre-line;">{{$component->fields->content_sub_title}}</p>
                        @endif
                        <div class="col-12 py-0 px-1 ">


                            @php
                            /*{{dd($component)}}*/
                            $component_content = \MainHelper::arrayToObject([
                                'type' => $component->fields->content->type,
                                'selected_slugs' => $component->fields->content->selected_slugs,
                                'items_count' => $component->fields->content->items_count,
                                'view_type' => $component->fields->content->view_type,
                                'paginate' => $component->fields->content->paginate,
                                
                                'id'=> $component->fields?->id,
                                'design_text_alignment'=> $component->fields->design_text_alignment,
                                'design_min_height'=>$component->fields->design_min_height,
                                'design_columns' => $component->fields->design_columns,
                                'design_columns_mobile' => $component->fields->design_columns_mobile,

                            ]);
                            $get_block_content = \MainHelper::get_block_content($component_content);
                            @endphp
                            {!!$get_block_content['html']!!}

                            @if($component->fields->buttons != null)
                            <div class="col-12 px-0 d-flex btns-group mt-2 {{$component->fields->design_text_alignment}}">
                                @foreach($component->fields->buttons as $button)
                                <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button->fields->class}}" href="{{$button->fields->url??'#'}}" target="{{$button->fields->url_open_type}}" style="border-radius: 3px;">
                                    {{$button->fields->title}}
                                </a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="appended-html-css-js">{!!$component->fields->design_custom_code!!}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
