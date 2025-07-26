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
                    كود مفتاح الدولة (مثل 20)
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[calling_code]" class="form-control" value="{{$plugin->settings['calling_code']??""}}">
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    رقم الهاتف
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[phone_number]" class="form-control" value="{{$plugin->settings['phone_number']??""}}">
                </div>
            </div>

            
            
            <div class="col-12 p-2">
                <div class="col-12">
                    كلمة المرور
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[password]" class="form-control" value="{{$plugin->settings['password']??""}}">
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    كود Session Id
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[session_id]" class="form-control" value="{{$plugin->settings['session_id']??""}}">
                </div>
            </div>


            <div class="col-12 p-2">
                <div class="col-12">
                    كود Api Key
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[api_key]" class="form-control" value="{{$plugin->settings['api_key']??""}}">
                </div>
            </div>


            <div class="col-12 p-2">
                <div class="col-12">
                    كود Access Token (اتركه فارغاً)
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[access_token]" class="form-control" value="{{$plugin->settings['access_token']??""}}">
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    كود Refresh Access Token (اتركه فارغاً)
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[refresh_access_token]" class="form-control" value="{{$plugin->settings['refresh_access_token']??""}}">
                </div>
            </div>

 
            <div class="col-12 p-2">
                <div class="col-12">
                    شحن مجاني لكل الطلبات
                </div>
                <div class="col-12 pt-3">
                    <input type="number" min="0" max="1" name="settings[is_free_shipping_preferred]" class="form-control" value="{{$plugin->settings['is_free_shipping_preferred']??0}}" required>
                </div>
            </div>
 
            <div class="col-12 p-2">
                <div class="col-12">
                    تفعيل خصم على صافي الربح عند رفض العميل الاستلام
                </div>
                <div class="col-12 pt-3">
                    <input type="number" min="0" max="1" name="settings[is_profit_discount_preferred]" class="form-control" value="{{$plugin->settings['is_profit_discount_preferred']??"0"}}" required>
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    تطبيق خصم لكسب العميل بحد أقصى من هامش الربح
                </div>
                <div class="col-12 pt-3">
                    <input type="number" min="0" max="99" name="settings[preferred_profit_discount_percentage]" class="form-control" value="{{$plugin->settings['preferred_profit_discount_percentage']??"20"}}" required>
                </div>
            </div>




            <div class="col-12 p-2">
                <div class="col-12">
                    نسبة الربح العامة لهذا المزود (يمكن تركها فارغة)
                </div>
                <div class="col-12 pt-3">
                    <input type="number" step="0.01" min="0" max="1000" name="settings[profit_margin]" class="form-control" value="{{$plugin->settings['profit_margin']??"30"}}" required placeholder="مثل 10 أو 30">
                </div>
            </div>

            



     

            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
