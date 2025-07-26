<div class="col-12 p-0" style="max-width: 100%;width: width:95%;">
    <style type="text/css">
        .fancybox__content{
            width:100%;
        }
    </style>
    <form method="POST" action="{{route('admin.website.plugins.push',['plugin'=>$plugin])}}">
        @csrf
        <h5><img src="{{collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['image']}}" style="width: 15px;"> {{collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['title']}}</h5>
        <p>{{ mb_strimwidth(collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['description'],0,80,'...')}}</p>
        <div class="col-12 my-3">
            <div class="hr"></div>
        </div>
        <div class="col-12 p-0">
            <div class="col-12 p-0">


                <div class="col-12 col-lg-12 p-2">
                    <div class="col-12">
                        تفعيل الاضافة
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="activated" value="1" role="switch" {{old('activated',$plugin??1) == 1 ?'checked':''}} style="outline: none;">
                        </div>
                    </div>
                </div>

                <div class="col-12 row p-0">
                    
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">
                            أرقام الهواتف
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="phones" class="form-control" style="min-height:300px;direction:ltr" placeholder="ضع كل رقم في سطر منفصل"
                            ></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">
                            متغير 1 (V1)
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="v1" class="form-control" style="min-height:300px" placeholder="ضع كل رسالة في سطر منفصل"

                            ></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">
                            متغير 2 (V2)
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="v2" class="form-control" style="min-height:300px" placeholder="ضع كل رسالة في سطر منفصل"></textarea>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">
                            متغير 3 (V3)
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="v3" class="form-control" style="min-height:300px" placeholder="ضع كل رسالة في سطر منفصل"></textarea>
                        </div>
                    </div> --}}

                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        دولة أرقام الهواتف
                    </div>
                    <div class="col-12 pt-3">
                        @php
                        $auth_country_code = auth()->user()->country_code?? (new UserSystemInfoHelper)->get_country_from_ip(\UserSystemInfoHelper::get_ip())['country_code'];
                        @endphp

                        <select class="form-control select2-select" required name="country_code">
                            <option value>بدون (الأرقام مضاف إليها مفاتيح الدول بالفعل)</option>
                            @foreach(collect(config()->get('countries'))->sortByDesc('order') as $country)
                                <option value="{{str_replace('+', '', $country['dial_code'] )}}" {{$auth_country_code == $country['iso2'] ? 'selected':'' }} >{{$country['flag']}} {{$country['name_ar']}} ({{$country['dial_code']}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-12 p-0">
                    <div class="col-12 p-2">
                        <div class="col-12">
                            محتوى الرسالة
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="message" class="form-control" style="min-height:100px"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0" >أرسال</button>
            </div>
        </div>
    </form>
</div>