<div class="col-12 p-0" style="max-width: 100%;">
    <style type="text/css">.force-ltr{direction:ltr!important}</style>
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
                    كود MAIL_MAILER
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[MAIL_MAILER]" class="form-control force-ltr" value="{{$plugin->settings['MAIL_MAILER']??""}}">
                </div>
            </div>

            <div class="col-12 p-2">
                <div class="col-12">
                    كود MAIL_HOST
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[MAIL_HOST]" class="form-control force-ltr" value="{{$plugin->settings['MAIL_HOST']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    كود MAIL_PORT
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[MAIL_PORT]" class="form-control force-ltr" value="{{$plugin->settings['MAIL_PORT']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    كود MAIL_USERNAME
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[MAIL_USERNAME]" class="form-control force-ltr" value="{{$plugin->settings['MAIL_USERNAME']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    كود MAIL_PASSWORD
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[MAIL_PASSWORD]" class="form-control force-ltr" value="{{$plugin->settings['MAIL_PASSWORD']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    كود MAIL_ENCRYPTION
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[MAIL_ENCRYPTION]" class="form-control force-ltr" value="{{$plugin->settings['MAIL_ENCRYPTION']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    كود MAIL_FROM_ADDRESS
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[MAIL_FROM_ADDRESS]" class="form-control force-ltr" value="{{$plugin->settings['MAIL_FROM_ADDRESS']??""}}">
                </div>
            </div>
            <div class="col-12 p-2">
                <div class="col-12">
                    كود MAIL_FROM_NAME
                </div>
                <div class="col-12 pt-3">
                    <input type="text" name="settings[MAIL_FROM_NAME]" class="form-control force-ltr" value="{{$plugin->settings['MAIL_FROM_NAME']??""}}">
                </div>
            </div>


            <div class="col-12 col-lg-12 p-2">
                <button class="btn btn-success rounded-0">حفظ التعديلات</button>
            </div>
        </div>
    </form>
</div>
