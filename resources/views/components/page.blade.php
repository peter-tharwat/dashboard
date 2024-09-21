<div class="col-12 p-0 row">
      <div style="position:relative;" class="content-block block_{{$component['fields']['id']}} px-0"  >
          <div class='position-relative  border-0 hoverable-elements-builder appened-element' style="color:{{$component['fields']['design_text_color']}}" >
              <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 0;background-size:cover;background-repeat:no-repeat;background-position:center; @if($component['fields']['design_background_color'] !=null )background-color:{{$component['fields']['design_background_color']}};@endif @if($component['fields']['design_background_url']!=null) background-image:  url('{{$component['fields']['design_background_url']}}') @endif ;
              opacity: {{$component['fields']['design_background_opacity']}};
              filter: blur({{$component['fields']['design_background_blur']}}) grayscale({{$component['fields']['design_background_grayscale']}}%);"></div>

              <div style="width: 100%;height: 100%;position: absolute;top: 0px;right: 0px;z-index: 0;background:cover;background: #000;opacity: {{$component['fields']['design_background_black']}}" ></div>

              @if($component['fields']['block_type'] == "component_cta")
              <div class='main-content-of-block py-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component['fields']['design_min_height']}}dvh">
                  <div class="container p-2">
                      <div class="appended-html-css-js">{!!$component['fields']['design_custom_css']!!}</div>
                      <div  class='col-12 col-lg-9 mx-auto {{$component['fields']['design_text_alignment']}}'>
                          <h4 class='display-5 mb-3 {{$component['fields']['design_text_alignment']}}' style="color:inherit;">{{$component['fields']['content_title']}}</h4>

                          <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="margin:5px 0px 8px!important;opacity: 0.9">{{$component['fields']['content_sub_title']}}</p>
                          <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="white-space: pre-line;opacity: 0.9">{{$component['fields']['content_description']}}</p>
                          <div class="col-12 p-0 d-flex btns-group {{$component['fields']['design_text_alignment']}}">

                              @foreach($component['fields']['buttons'] as $button)
                          
                                  <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button['fields']['class']}}"  target="{{$button['fields']['url_open_type']}}" style="border-radius: 3px;">
                                      {{$button['fields']['title']}}
                                  </a>
                           
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
              @endif

              @if($component['fields']['block_type'] == "component_banner")
              <div class='main-content-of-block py-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component['fields']['design_min_height']}}dvh">
                  <div class="container p-2">
                      <div class="appended-html-css-js">{!!$component['fields']['design_custom_css']!!}</div>
                      <div class='col-12 col-lg-9 mx-auto {{$component['fields']['design_text_alignment']}}'>
                          <h4 class='display-5 mb-3 {{$component['fields']['design_text_alignment']}}' style="color:inherit;">{{$component['fields']['content_title']}}</h4>
                          <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="margin:5px 0px 8px!important;opacity: 0.9">{{$component['fields']['content_sub_title']}}</p>
                          <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="white-space: pre-line;opacity: 0.9">{{$component['fields']['content_description']}}</p>
                          <div class="col-12 p-0 d-flex btns-group {{$component['fields']['design_text_alignment']}}">
                            @foreach($component['fields']['buttons'] as $button)
                           
                                  <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button['fields']['class']}}"  target="{{$button['fields']['url_open_type']}}" style="border-radius: 3px;">
                                      {{$button['fields']['title']}}
                                  </a>
                             
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
              @endif

              @if($component['fields']['block_type'] == "component_text")
              <div class='main-content-of-block py-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component['fields']['design_min_height']}}dvh">
                  <div class="container p-2">
                      <div class="appended-html-css-js">{!!$component['fields']['design_custom_css']!!}</div>
                      <div class='col-12 col-lg-9 mx-auto {{$component['fields']['design_text_alignment']}}'>
                          <h4 class='display-5 mb-3 {{$component['fields']['design_text_alignment']}}' style="color:inherit;">{{$component['fields']['content_title']}}</h4>
                          <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="margin:5px 0px 8px!important;opacity: 0.9">{{$component['fields']['content_sub_title']}}</p>
                          <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="white-space: pre-line;opacity: 0.9">{{$component['fields']['content_description']}}</p>
                          <div class="col-12 p-0 d-flex btns-group {{$component['fields']['design_text_alignment']}}">
                            @foreach($component['fields']['buttons'] as $button) 
                                  <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button['fields']['class']}}"  target="{{$button['fields']['url_open_type']}}" style="border-radius: 3px;">
                                      {{$button['fields']['title']}}
                                  </a>
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
              @endif
              @if($component['fields']['block_type'] == "component_text_with_image")
              <div class='main-content-of-block py-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component['fields']['design_min_height']}}dvh">
                  <div class="container p-2">
                      <div class="appended-html-css-js">{!!$component['fields']['design_custom_css']!!}</div>
                      <div class=' mx-auto row {{$component['fields']['design_text_alignment']}} {{$component['fields']['design_content_alignment']}}'>
                          <div class="col-12 col-lg-6 mx-auto">
                              <img src="{{$component['fields']['content_image_url']}}" style="width:100%;border-radius: 8px;">
                          </div>
                          <div class="col-12 col-lg-6 d-flex align-items-center row mx-auto">
                              <div class="col-12 px-0 py-3 row ">
                                  <h3 class='display-5 mb-3 {{$component['fields']['design_text_alignment']}}' style="color:inherit;">{{$component['fields']['content_title']}}</h3>
                                  <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="margin:5px 0px 8px!important;opacity: 0.9">{{$component['fields']['content_sub_title']}}</p>
                                  <p  class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="white-space: pre-line;opacity: 0.9">{{$component['fields']['content_description']}}</p>
                                  <div class="col-12 p-0 d-flex btns-group {{$component['fields']['design_text_alignment']}}" >


                                    @foreach($component['fields']['buttons'] as $button) 
                                        <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button['fields']['class']}}"  target="{{$button['fields']['url_open_type']}}" style="border-radius: 3px;">
                                            {{$button['fields']['title']}}
                                        </a> 
                                    @endforeach


                            

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endif
              @if($component['fields']['block_type'] == "component_text_with_video")
              <div class='main-content-of-block py-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component['fields']['design_min_height']}}dvh">
                  <div class="container p-2">
                      <div class="appended-html-css-js">{!!$component['fields']['design_custom_css']!!}</div>
                      <div :class="[{{$component['fields']['design_text_alignment']}},{{$component['fields']['design_content_alignment']}}]" class=' mx-auto row '>
                          <div class="col-12 col-lg-6 mx-auto">
                              <iframe src="{{\MainHelper::convert_to_embed($component['fields']['content_video_url'])}}" style="width:100%;height: 100%;border-radius: 10px;"></iframe>
                          </div>
                          <div class="col-12 col-lg-6 d-flex align-items-center row mx-auto">
                              <div class="col-12 px-0 py-3 row ">
                                  <h3 class='display-5 mb-3 {{$component['fields']['design_text_alignment']}}' style="color:inherit;">{{$component['fields']['content_title']}}</h3>
                                  <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="margin:5px 0px 8px!important;opacity: 0.9">{{$component['fields']['content_sub_title']}}</p>
                                  <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="white-space: pre-line;opacity: 0.9">{{$component['fields']['content_description']}}</p>
                                  <div class="col-12 p-0 d-flex btns-group {{$component['fields']['design_text_alignment']}}" >
                                      @foreach($component['fields']['buttons'] as $button) 
                                        <a class="btn mx-1 font-1 font-lg-2 py-1 px-4 py-lg-2 px-lg-5 {{$button['fields']['class']}}"  target="{{$button['fields']['url_open_type']}}" style="border-radius: 3px;">
                                            {{$button['fields']['title']}}
                                        </a> 
                                    @endforeach
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endif
              @if($component['fields']['block_type'] == "component_features")
              <div class='main-content-of-block py-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component['fields']['design_min_height']}}dvh">
                  <div class="container p-2">
                      <div class="appended-html-css-js">{!!$component['fields']['design_custom_css']!!}</div>
                      <div class='{{$component['fields']['design_text_alignment']}} {{$component['fields']['design_content_alignment']}} '>
                          <h5 class='display-6 mb-3 {{$component['fields']['design_text_alignment']}}' style="color:inherit;">{{$component['fields']['content_title']}}</h5>
                          <p class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}}' style="margin:5px 0px 8px!important;opacity: 0.9;white-space: pre;">{{$component['fields']['content_description']}}</p>
                          <div class="col-12 px-0 py-5 d-flex features-group row {{$component['fields']['design_text_alignment']}} {{$component['fields']['design_content_alignment']}}" >

                            @foreach($component['fields']['features'] as $feature)
                          
                              <div  class="p-3 mx-auto {{$component['fields']['design_columns']}} my-3">
                                @if($feature['fields']['url'] != "")
                                <a href="{{$feature['fields']['url']}}" class="col-12 p-0 row" target="{{$feature['fields']['url_open_type']}}" style="color:inherit;">
                                @endif
                                  <div class="col-12 mb-1 px-2 text-center">
                                      <img src="{{$feature['fields']['image_url']}}" style="width:100px">
                                  </div>
                                  <div class="col-12 mb-1 px-2 text-center">
                                      {{$feature['fields']['title']}}
                                  </div>
                                  <div class="col-12 px-2 text-center" style="font-size:13px;opacity:0.9;white-space: pre-line;">{{$feature['fields']['content']}}</div>
                                @if($feature['fields']['url'] != "")
                                </a>
                                @endif
                              </div>
                            @endforeach


                          </div>
                      </div>
                  </div>
              </div>
              @endif
              @if($component['fields']['block_type'] == "component_faqs")
              <div class='main-content-of-block py-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component['fields']['design_min_height']}}dvh">
                  <div class="container p-2">
                      <div class="appended-html-css-js">{!!$component['fields']['design_custom_css']!!}</div>
                      <div class='{{$component['fields']['design_text_alignment']}}'>
                          <h5 class='display-6 mb-3 {{$component['fields']['design_text_alignment']}}' style="color:inherit;">{{$component['fields']['content_title']}}</h5>
                          <p  class=' mb-6  font-1 font-lg-2 {{$component['fields']['design_text_alignment']}} ' style="margin:5px 0px 8px!important;opacity: 0.9;white-space:pre-line;">{{$component['fields']['content_description']}}</p>
                          <div class="col-12 px-0 py-5 d-flex faqs-group row {{$component['fields']['design_text_alignment']}}">
                              <div class="col-12 px-2 mb-3 accordion">
                                @foreach($component['fields']['faqs'] as $faq)
                                  <div class=" p-1">
                                      <div class="accordion-item mb-1" style="border:1px solid #e7e7ec!important;background: transparent;box-shadow: 0 .5rem .937rem #8c98a41a!important;">
                                          <h2 class="accordion-header">
                                              <button class="accordion-button font-2 font-lg-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$faq['id']}}"   aria-controls="#collapse_{{$faq['id']}}" style="background-color:transparent;padding: 20px;font-weight: bold;text-align: start;color:{{$component['fields']['design_text_color']}}">
                                                  {{$faq['fields']['title']}}
                                              </button>
                                          </h2>
                                          <div id="collapse_{{$faq['id']}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="border-top:1px solid #e7e7ec!important;background-color: transparent;">
                                              <div class="accordion-body p-3 row">
                                                  <div class="col-12 px-2 font-1 font-lg-2" style="opacity:0.9;color:{{$component['fields']['design_text_color']}}" >
                                                      {{$faq['fields']['content']}}
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endif
              @if($component['fields']['block_type'] == "component_html")
              <div class='main-content-of-block py-9 d-flex align-items-center justify-content-center ' style="z-index: 2;position: relative;min-height:{{$component['fields']['design_min_height']}}dvh">
                  <div class="container p-2">
                      <div class="appended-html-css-js">{!!$component['fields']['design_custom_css']!!}</div>
                      <div v-html="{{$component['fields']['content_html']}}"></div>
                  </div>
              </div>
              @endif
          </div>
      </div>
</div>