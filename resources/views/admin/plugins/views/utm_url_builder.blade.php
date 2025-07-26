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

                <div class="col-12 p-2">
                    <div class="col-12">
                        رابط الحملة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="url" id="utm_url_builder_url" class="form-control">
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        مصدر الحملة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" id="utm_url_builder_campaign_source" class="form-control" placeholder="مثال: facebook,tiktok">
                    </div>
                </div>

                <div class="col-12 p-2">
                    <div class="col-12">
                        وسيط الحملة
                    </div>
                    <div class="col-12 pt-3">
                        <input type="text" id="utm_url_builder_campaign_medium" class="form-control" placeholder="مثال: cpc,banner,email">
                    </div>
                </div>



                <div class="col-12 p-2" id="utm_url_builder_container" style="display:none">
                    <div class="col-12 py-5">
                        <div class="hr"></div>
                    </div>
                    <div class="col-12 text-center">
                        رابط الحملة
                    </div>
                    <div class="col-12 pt-3">
                        <textarea type="text" class="form-control border-0" style="border:none!important;box-shadow: none;outline: none;direction: ltr;min-height: 100px;" readonly id="utm_url_builder_value"></textarea>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-12 p-2">
                <a class="btn btn-success rounded-0" id="utm_url_builder_generate">انشاء رابط الحملة</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    var element = document.getElementById('utm_url_builder_generate').addEventListener("click", function(){

        const baseUrl = document.getElementById('utm_url_builder_url').value;
        const campaignSource = document.getElementById('utm_url_builder_campaign_source').value;
        const campaignMedium = document.getElementById('utm_url_builder_campaign_medium').value;
        
        if (!baseUrl || !campaignSource || !campaignMedium) {
            alert('برجاء وضع قيم صحيحة');
            return null;
        }
        const utmUrl = `${baseUrl}?utm_source=${encodeURIComponent(campaignSource)}&utm_medium=${encodeURIComponent(campaignMedium)}`;
        

        

        const utm_url_builder_value = document.getElementById('utm_url_builder_value');
        if (utm_url_builder_value) {
            utm_url_builder_value.value = utmUrl;
            document.getElementById('utm_url_builder_container').style.display = 'block';
        }else{
            document.getElementById('utm_url_builder_container').style.display = 'none';
        }
        return utmUrl;

    });

</script>