<div class="col-12 p-0" style="max-width: 100%;">
    <form method="POST" action="{{route('admin.plugins.update',['plugin'=>$plugin])}}">
        @method("PUT")
        @csrf
        <h5><img src="{{collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['image']}}" style="width: 15px;"> {{collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['title']}}</h5>
        <p>{{ mb_strimwidth(collect(config()->get('plugins'))->where('slug',$plugin->slug)->first()['description'],0,80,'...')}}</p>
        <div class="col-12 my-3">
            <div class="hr"></div>
        </div>
        <div class="col-12 p-0">
            <div class="col-12 col-lg-6 p-2">
                <div class="col-12">
                    تفعيل الاضافة
                </div>
                <div class="col-12 pt-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="activated" value="1" role="switch" {{old('activated',$plugin??1) == 1 ?'checked':''}} style="outline: none;">
                    </div>
                </div>
            </div>
            
            <div class="col-12 p-2">
                <div class="col-12">
                    الاسم المفضل (أو رابط صورة)
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[SHOW_AS]" class="form-control" value="{{$plugin->settings['SHOW_AS']??""}}">
                </div>
            </div>
            
            <div class="col-12 p-2">
                <div class="col-12">
                    كود KASHIER_ACCOUNT_KEY
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[KASHIER_ACCOUNT_KEY]" class="form-control" value="{{$plugin->settings['KASHIER_ACCOUNT_KEY']??""}}">
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    كود KASHIER_IFRAME_KEY
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[KASHIER_IFRAME_KEY]" class="form-control" value="{{$plugin->settings['KASHIER_IFRAME_KEY']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    كود KASHIER_TOKEN
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[KASHIER_TOKEN]" class="form-control" value="{{$plugin->settings['KASHIER_TOKEN']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    نوع الدمج
                </div>
                <div class="col-12 pt-3">
                    <select class="form-control" name="settings[KASHIER_MODE]">
                        <option value="live" {{($plugin->settings['KASHIER_MODE']??"")=="live"?'selected':''}}>مباشر</option>
                        <option value="test" {{($plugin->settings['KASHIER_MODE']??"")=="test"?'selected':''}}>تجريبي</option>
                    </select>
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    العملة
                </div>
                <div class="col-12 pt-3">
                    <select class="form-control" name="settings[KASHIER_CURRENCY]">
                        <option value="EGP" {{($plugin->settings['KASHIER_CURRENCY']??"")=="EGP"?'selected':''}}>جنيه مصري</option>
                    </select>
                </div>
            </div>

            <div class="col-12 p-0 row">
                
            
            <div class="col-6 p-2">
                <div class="col-12">
                    رسوم ثابتة
                </div>
                <div class="col-12 pt-3">
                    <input type="number" step="0.1" name="settings[FIXED_FEES]" class="form-control" value="{{$plugin->settings['FIXED_FEES']??0}}">
                </div>
            </div>

            <div class="col-6 p-2">
                <div class="col-12">
                    رسوم مئوية %
                </div>
                <div class="col-12 pt-3">
                    <input type="number" step="0.1" name="settings[PERCENTAGE_FEES]" class="form-control" value="{{$plugin->settings['PERCENTAGE_FEES']??0}}">
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    أولوية الظهور (الأعلى يظهر أولاً)
                </div>
                <div class="col-12 pt-3">
                    <input type="number" step="0.1" name="settings[order]" class="form-control" value="{{$plugin->settings['order']??0}}">
                </div>
            </div>
            

            </div>

            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
