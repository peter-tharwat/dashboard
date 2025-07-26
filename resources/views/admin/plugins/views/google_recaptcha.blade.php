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
                    كود RECAPTCHA_SITE_KEY
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[RECAPTCHA_SITE_KEY]" class="form-control" value="{{$plugin->settings['RECAPTCHA_SITE_KEY']??""}}">
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    كود RECAPTCHA_SECRET_KEY
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[RECAPTCHA_SECRET_KEY]" class="form-control" value="{{$plugin->settings['RECAPTCHA_SECRET_KEY']??""}}">
                </div>
            </div>
     

            <div class="col-12 p-0">
                <div class="alert alert-info my-2">
                    1- انشاء Recaptcha عبر <br><a href="https://www.google.com/recaptcha/admin/">https://www.google.com/recaptcha/admin/</a> 
                    <br>
                    2- قم باستخراج RECAPTCHA_SITE_KEY و RECAPTCHA_SECRET_KEY وكذلك وضع رابط موقعك في الحسابات الموثوقة
                    <br>
                    <code>{{env('APP_URL')}}</code>
                </div>
            </div>

            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
