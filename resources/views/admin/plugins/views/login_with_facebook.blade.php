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
                    كود client_id
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[client_id]" class="form-control" value="{{$plugin->settings['client_id']??""}}">
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    كود client_secret
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[client_secret]" class="form-control" value="{{$plugin->settings['client_secret']??""}}">
                </div>
            </div>
        

            <div class="col-12 p-0">
                <div class="alert alert-info my-2">
                    1- انشاء حساب عبر <br><a href="https://developers.facebook.com/apps/">https://developers.facebook.com/apps/</a> 
                    <br>
                    2- قم بانشاء تطبيق جديد
                    <br>
                    3- برجاء وضع الروابط التالية كروابط رجوع موثوقة في web و javascript
                    <br>
                    <code>{{env('APP_URL')}}/login/facebook/callback</code>
                </div>
            </div>


 
 

            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
