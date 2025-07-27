@if(isset($website) &&  $lucky_wheel = $website->plugins->where('activated')->where('slug','lucky_wheel')->first())
@if(count(collect($lucky_wheel->settings['fields'])->whereNotNull("title")))
<span data-fancybox data-src="#lucky_wheel_popup" id="lucky_wheel_popup_btn" class="btn btn-light lucky_wheel_popup_btn rounded-pill " style="position: fixed;left: 20px;bottom: 85px;z-index: 1000;border:2px dashed {{$lucky_wheel->settings['wheel_color']??"#c7160c"}};box-shadow: 0px 0px 80px {{\MainHelper::color_opacity($lucky_wheel->settings['wheel_color'],30)}};padding: 10px;display: none;">

    {{$lucky_wheel->settings['title']}}
</span>
<div id="lucky_wheel_popup" style="display:none;max-width:100%;width: 600px;padding: 20px 5px;border-radius: 15px;">
    <img id="lucky_wheel_winning_image_left" src="/images/winning_left.gif" style="width:500px;max-width: 90%;position: fixed;left: 0px;z-index: 1200;display: none;">
    <img id="lucky_wheel_winning_image_right" src="/images/winning_right.gif" style="width:500px;max-width: 90%;position: fixed;right: 0px;z-index: 1200;display: none;">
    <div class="col-12 p-0 " style="width:100%">
        <div class="col-12 col-lg-6 mx-auto lucky_wheel_wheel_container" style="
    aspect-ratio: 1/1;
    width: 100%;background-image: url('/images/lucky_wheel.svg');background-size: 100% 100%;z-index: 11;background-position: center;"></div>
        <style type="text/css">
        .lucky_wheel_wheel_container canvas {
            z-index: -1;
            position: relative;
        }

        </style>
    </div>
    <script type="module">
        import {Wheel} from 'https://cdn.jsdelivr.net/npm/spin-wheel@5.0.2/dist/spin-wheel-esm.js';

            var next_spin = localStorage.getItem('next_wheel_{{\MainHelper::get_website_id()}}_spin_{{$lucky_wheel->settings['id']}}');

            if(next_spin == null || next_spin < new Date().getTime() ){
                document.getElementById('lucky_wheel_popup_btn').classList.add("d-block");
            

            

            (function(){
            const props = 
            {
                name: 'Movies',
                radius: 0.88,
                itemLabelRadius: 0.90,
                itemLabelRadiusMax: 0.20,
                itemLabelRotation: 0,
                itemLabelAlign: 'right',
                itemLabelBaselineOffset: -0.13,
                itemLabelFont: 'Dinnext, sans-serif',
                itemBackgroundColors: ['{{$lucky_wheel->settings['wheel_color']??"#c7160c"}}', '#fff'],
                itemLabelColors: ['#fff', '#000'],
                rotationSpeedMax: 700,
                rotationResistance: -70,
                lineWidth: 0,
                itemLabelFontSize:25,
                itemLabelStrokeColor:'light-dark(rgb(255 255 255), rgb(0 0 0))',
                itemLabelFontSizeMax:106,
                itemLabelBaselineOffset:0,
                isInteractive:false,
                items: [
                  @foreach(collect($lucky_wheel->settings['fields'])->whereNotNull("title") as $field)
                  {
                    label: '{{$field['title']}}',
                  },
                  @endforeach

                ],
              }
            var container = document.querySelector('.lucky_wheel_wheel_container');
            window.lucky_wheel = new Wheel(container, props);
        })();

    function addHoursToCurrentTime(hoursToAdd) {
        const currentTime = new Date(); // Get the current time
        currentTime.setHours(currentTime.getHours() + hoursToAdd); // Add the hours
        return currentTime.getTime(); // Return the updated time
    }
    

    document.getElementById('lucky_wheel_form').addEventListener('submit', function(event) {
        document.getElementById('lucky_wheel_winning_image_left').classList.remove("d-block");
        document.getElementById('lucky_wheel_winning_image_right').classList.remove("d-block");

        event.preventDefault();
        
        const lucky_wheel_form = document.getElementById('lucky_wheel_form');
        const formData = new FormData(lucky_wheel_form);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{route('website.plugin.notify')}}', true);
        xhr.onload = function() {
            if (xhr.status === 200) {

                document.getElementById('lucky_wheel_form').classList.add("d-none");
                localStorage.setItem('next_wheel_{{\MainHelper::get_website_id()}}_spin_{{$lucky_wheel->settings['id']}}',addHoursToCurrentTime({{$lucky_wheel->settings['hide_in_browser_for_hours']??0}}));

                if(JSON.parse(xhr.responseText).index!=null){
                    const lucky_wheel_sound = document.getElementById("lucky_wheel_sound");
                    if (lucky_wheel_sound) {

                        if (!lucky_wheel_sound.paused) {
                            lucky_wheel_sound.pause();
                            lucky_wheel_sound.currentTime = 0;
                        } else {
                            document.querySelectorAll('audio').forEach(a => {
                                if (!a.paused) {
                                    a.pause();
                                    a.currentTime = 0;
                                }
                            });
                            lucky_wheel_sound.play();
                        }
                        setTimeout(function(){

                            document.getElementById('lucky_wheel_winning_image_left').classList.add("d-block");
                            document.getElementById('lucky_wheel_winning_image_right').classList.add("d-block");
                            const lucky_wheel_winning_sound = document.getElementById("lucky_wheel_winning_sound");
                            if (lucky_wheel_winning_sound) {
                                if (!lucky_wheel_winning_sound.paused) {
                                    lucky_wheel_winning_sound.pause();
                                    lucky_wheel_winning_sound.currentTime = 0;
                                } else {
                                    document.querySelectorAll('audio').forEach(a => {
                                        if (!a.paused) {
                                            a.pause();
                                            a.currentTime = 0;
                                        }
                                    });
                                    lucky_wheel_winning_sound.play();
                                }
                            }


                            document.getElementById('lucky_wheel_result').classList.add("d-block");
                            document.getElementById('lucky_wheel_result_title').classList.add("d-inline-block");
                            document.getElementById('lucky_wheel_result_title').innerText = JSON.parse(xhr.responseText).title;
                            if(JSON.parse(xhr.responseText).coupon != null ){
                                document.getElementById('lucky_wheel_result_coupon_container').classList.add("d-block");
                                document.getElementById('lucky_wheel_result_coupon_text').innerText = JSON.parse(xhr.responseText).coupon;
                            }else{
                                document.getElementById('lucky_wheel_result_coupon_container').classList.add("d-none");
                                document.getElementById('lucky_wheel_result_coupon_text').innerText = JSON.parse(xhr.responseText).coupon;
                            }
                        },6000);
                        
                        
                        document.getElementById('lucky_wheel_spin_btn').setAttribute('disabled','disabled');
                        window.lucky_wheel.spinToItem(JSON.parse(xhr.responseText).index, 6000, true, 10, 1)
                        //document.getElementById('response').innerText = xhr.responseText;
                    }
                }
            } else {
                alert("حدث خطأ اثناء معالجة طلبك");
            }
        };
        xhr.send(formData);
    });
    }
</script>
    <audio controls class="d-none" id="lucky_wheel_sound">
        <source src="/sounds/lucky_wheel_sound.mp3" type="audio/mpeg">
    </audio>
    <audio controls class="d-none" id="lucky_wheel_winning_sound">
        <source src="/sounds/lucky_wheel_winning_sound.mp3" type="audio/mpeg">
    </audio>
    <div class="col-12 p-0">
        <form method="POST" action="#" id="lucky_wheel_form">
            <input type="hidden" name="plugin" value="lucky_wheel">
            @csrf
            <div class="col-12 py-2 px-4">
                <div class="col-10 mx-auto p-0">
                    @if($lucky_wheel->settings['name_required']??0==1)
                    <input class="form-control my-1" required type="text" minlength="2" name="name" placeholder="{{$lucky_wheel->settings['name_title']}}" style="border-color: {{$lucky_wheel->settings['wheel_color']??"#c7160c"}}!important;direction: rtl!important">
                    @endif
 
@if($lucky_wheel->settings['phone_required']??0==1)
                    <input class="form-control my-1" required type="number" min="999999" name="phone" placeholder="{{$lucky_wheel->settings['phone_title']}}" style="border-color: {{$lucky_wheel->settings['wheel_color']??"#c7160c"}}!important;direction: rtl!important">
                    @endif
                  @if($lucky_wheel->settings['email_required']??0==1)
                    <input class="form-control my-1" required type="email" name="email" placeholder="{{$lucky_wheel->settings['email_title']}}" style="border-color: {{$lucky_wheel->settings['wheel_color']??"#c7160c"}}!important;direction: rtl!important">
                    @endif
                    
                </div>
            </div>
            <div class="col-12 py-0 text-center px-4">
                <button class="btn col-4 col-lg-10 btn-danger font-3 py-1 rounded d-inline-block" id="lucky_wheel_spin_btn" style="background: {{$lucky_wheel->settings['wheel_color']??"#c7160c"}};border-color: {{$lucky_wheel->settings['wheel_color']??"#c7160c"}};color: #fff;">أدر العجلة</button>
            </div>
        </form>
    </div>
    <div class="col-12 px-0 py-3" id="lucky_wheel_result" style="display:none">
        <div class="col-10 mx-auto px-0 font-3 text-center mb-2" style="color: {{$lucky_wheel->settings['wheel_color']??"#c7160c"}};">
            🎉 تهانينا
        </div>
        <div class="col-10 mx-auto px-0 font-3 text-center mb-2" style="color: {{$lucky_wheel->settings['wheel_color']??"#c7160c"}};">
            <span id="lucky_wheel_result_title"></span>
        </div>
        <div class="col-10 mt-3 mx-auto px-0  text-center" style="color: {{$lucky_wheel->settings['wheel_color']??"#c7160c"}};display: none;" id="lucky_wheel_result_coupon_container">
            <div class="col-12 px-0 pb-2 font-4 rounded text-center" style="border:4px dashed {{$lucky_wheel->settings['wheel_color']??"#c7160c"}}">
                <div class="col-12 p-0 text-center" id="lucky_wheel_result_coupon_text">
                </div>
            </div>
            <span class="text-center font-small">
                قم بنسخ الكود التالي واستخدامه في طلبك القادم
            </span>
        </div>
    </div>
</div>
@endif
@endif
