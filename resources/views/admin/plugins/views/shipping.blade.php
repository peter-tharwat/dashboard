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
                    تفعيل الشحن
                </div>
                <div class="col-12 pt-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="activated" value="1" role="switch" {{old('activated',$plugin??1) == 1 ?'checked':''}} style="outline: none;">
                    </div>
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    قيمة الشحن لكل الاماكن (اتركه فارغاً ليتم تطبيق الشحن لكل مكان على حدى)
                </div>
                <div class="col-12 pt-3">
                    <input type="number"  step="0.01" name="settings[shipping_value]" class="form-control" value="{{$plugin->settings['shipping_value']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                   تفعيل الشحن المجاني
                </div>
                <div class="col-12 pt-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="settings[shipping_free_enabled]" value="1" role="switch" {{($plugin->settings['shipping_free_enabled']??0)==1 ?'checked':''}} style="outline: none;">
                    </div>
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    شحن مجاني عند تجاوز مبلغ
                </div>
                <div class="col-12 pt-3">
                    <input type="number"  step="0.01" name="settings[shipping_free_value]" class="form-control" value="{{$plugin->settings['shipping_free_value']??100000}}">
                </div>
            </div>
            
            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
