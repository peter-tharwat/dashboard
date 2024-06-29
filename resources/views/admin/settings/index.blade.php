@extends('layouts.admin')
@section('content')
<div class="col-12 p-3 row">
	 <div class="col-12 p-2 p-lg-4 card" style="min-height: 80vh;border-radius:10px">
	 	<div class="col-12 px-3 pb-3 pt-2">
	 		<h4 class="font-4">{{ __('lang.site_settings') }}</h4>
	 	</div>
	 	<div class="col-12 row" >
			<div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener active" data-opentab="general-tab">
				<span  class="fal fa-wrench me-2"></span>	{{ __('lang.general') }}
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener" data-opentab="appearance-tab">
				<span  class="fal fa-paint-roller me-2"></span>	{{ __('lang.general') }}
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener" data-opentab="links-tab">
				<span  class="fal fa-link me-2"></span>	{{ __('lang.links') }}
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener" data-opentab="pages-tab">
				<span  class="fal fa-pager me-2"></span>	{{ __('lang.pages') }}
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener" data-opentab="codes-tab">
				<span  class="fal fa-code me-2"></span>	{{ __('lang.codes') }}
			</div>
			<div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener" data-opentab="others-tab">
				<span  class="fal fa-cogs me-2"></span>	{{ __('lang.others') }}
			</div>
		</div>
	 	<form class="col-12 row " id="validate-form" method="POST" action="{{route('admin.settings.update')}}" enctype="multipart/form-data" >
	 	@csrf
	 	@method("PUT")
	 	<div class="col-12 col-lg-8 px-3 py-5">
	 		 
	 		<div class="col-12 row p-0 taber active" id="general-tab">
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.site_name') }}
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="" name="settings[website_name]" class="form-control" value="{{$settings['website_name']}}"  maxlength="190">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.address') }}
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<textarea name="settings[address]" class="form-control">{{$settings['address']}}</textarea>
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.website_bio') }}
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<textarea name="settings[website_bio]" class="form-control">{{$settings['website_bio']}}</textarea>
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.contact_email') }}
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="email" name="settings[contact_email]" class="form-control" value="{{$settings['contact_email']}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.website_logo') }} (200*200)
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="settings[website_logo]" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings['get_website_logo']}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.website_wide_logo') }} (500*200)
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="settings[website_wide_logo]" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings['get_website_wide_logo']}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.get_website_icon') }} (50*50)
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="settings[website_icon]" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings['get_website_icon']}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div> 
		 		</div>
	 		</div>






	 		<div class="col-12 row p-0 taber" id="appearance-tab">
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.website_cover') }} (800*500)
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="file" name="settings[website_cover]" class="form-control" >
		 				<div class="col-12 p-2">
		 					<img src="{{$settings['get_website_cover']}}" style="width:100px;max-height: 100px;">
		 				</div>
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.main_color') }}
		 			</div>

		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="color" name="settings[main_color]"  value="{{$settings['main_color']}}" maxlength="190">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.hover_color') }}
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<input type="color" name="settings[hover_color]"  value="{{$settings['hover_color']}}" maxlength="190">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
		 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
						{{ __('lang.dashboard_dark_mode') }}
		 			</div>
		 			<div class="col-12 col-lg-9 px-2">
		 				<div class="form-check form-switch">
		 				<input type="hidden" name="settings[dashboard_dark_mode]" value="0" >
						  <input class="form-check-input" type="checkbox" id="DarkModeInput" name="settings[dashboard_dark_mode]" {{$settings['dashboard_dark_mode']==1?'checked':""}} value="1">
						</div>
		 			</div> 
		 		</div>
		 	</div>
		 	<div class="col-12 row p-0 taber" id="links-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.phone') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="settings[phone]" class="form-control" value="{{$settings['phone']}}" maxlength="190">
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.phone2') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="settings[phone2]" class="form-control" value="{{$settings['phone2']}}" maxlength="190">
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.whatsapp_phone') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="" name="settings[whatsapp_phone]" class="form-control" value="{{$settings['whatsapp_phone']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.facebook_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[facebook_link]" class="form-control" value="{{$settings['facebook_link']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.twitter_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[twitter_link]" class="form-control" value="{{$settings['twitter_link']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.instagram_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[instagram_link]" class="form-control" value="{{$settings['instagram_link']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.youtube_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[youtube_link]" class="form-control" value="{{$settings['youtube_link']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.telegram_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[telegram_link]" class="form-control" value="{{$settings['telegram_link']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.whatsapp_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[whatsapp_link]" class="form-control" value="{{$settings['whatsapp_link']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.tiktok_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[tiktok_link]" class="form-control" value="{{$settings['tiktok_link']}}" >
	 			</div> 
	 		</div>
	 		
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.linkedin_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[linkedin_link]" class="form-control" value="{{$settings['linkedin_link']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.github_link') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[github_link]" class="form-control" value="{{$settings['github_link']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<br>
	 			<hr>
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.another_link1') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[another_link1]" class="form-control" value="{{$settings['another_link1']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.another_link2') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[another_link2]" class="form-control" value="{{$settings['another_link2']}}" >
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.another_link3') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<input type="url" name="settings[another_link3]" class="form-control" value="{{$settings['another_link3']}}" >
	 			</div> 
	 		</div>
	 	</div>
	 	<div class="col-12 row p-0 taber" id="pages-tab">

	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				{{ __('lang.contact_us') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea  name="settings[contact_page]" class="form-control" style="min-height: 300px">{{$settings['contact_page']}}</textarea>
	 			</div> 
	 		</div>
	 	 
	 	</div>
	 	<div class="col-12 row p-0 taber" id="codes-tab">
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.header_code') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="settings[header_code]" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings['header_code']}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.footer_code') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="settings[footer_code]" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings['footer_code']}}</textarea>
	 			</div> 
	 		</div> 
	 		<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
					{{ __('lang.robots_txt') }}
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<textarea name="settings[robots_txt]" class="form-control" style="min-height: 200px;text-align: left;direction: ltr;">{{$settings['robots_txt']}}</textarea>
	 			</div> 
	 		</div>
	 	</div>
	 	<div class="col-12 row p-0 taber" id="others-tab">
	 	</div>

	 </div>
 
	 	<div class="col-12 col-lg-8 px-0 d-flex mb-3 row pb-3">
 		 	
 		 	<div class="col-12 px-0 d-flex mb-3 row pb-3">
	 			<div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
	 				
	 			</div>
	 			<div class="col-12 col-lg-9 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">{{ __('lang.save') }}</button>
	 			</div> 
	 		</div> 

 		</div>

	  	</form>
	 </div> 
</div>
@endsection