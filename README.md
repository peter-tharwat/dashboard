# Simple Arabic Laravel Dashboard

- ✅  Auto Seo
- ✅  Optimized Notifications With Images
- ✅  Smart Alerts
- ✅  Auto Js Validations
- ✅  Front End Alert
- ✅  Nice Image Viewing FancyBox
- ✅  Drag And drop Feature
- ✅  Fully Arabic 😀
- ✅  Smart Editor With Upload Images
- ✅  Select from Already uploaded Files
- ✅  Fully Profile System With Avatars ( Can Resize Avatar )
- ✅  Fully Responsive
- ✅  Intervally Getting Notifcations Out Of The Box
- ✅  FontAwesome PRO 💥 + ResponsiveFonts + Noto Sans Arabic fonts Included
- ✅  Robots.txt and SiteMapGenerator
- ✅  General Statistics On Home Page ( New Users , Top Pages , Top Browsers , Top Devices , Top OSs , Top Ips , Top Users , and so on ...  )
- ✅  Custom 404 Page
- ✅  Nice Login , Register and Confirm Email Pages
- ✅  Most Common Settings
- ✅  Ready to integrate CloudFlare Firewall
- ✅  Smart Logging System
- ![https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/screenshot.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/screenshot.jpg)


### How to setup

```php
# copy .env.example to .env
cp .env.example .env
# generate security key , link storage file
php artisan key:generate
php artisan storage:link
# after connect your database via .env file 
php artisan migrate:fresh
php artisan db:seed
```

### Credentials

```php
login page : http://127.0.0.1:8000/login
email : admin@admin.com
password : password
```

### Main Yield Sections

```jsx
@yield('styles')
@yield('content')
@yield('after-body')
@yield('scripts')
```

### Notifications On Response

```jsx
// docs : https://github.com/mckenziearts/laravel-notify

notify()->info('content','title');

notify()->success('content','title');

notify()->error('content','title');
```

### Notifications On Frontend

```jsx
// docs : https://github.com/CodeSeven/toastr
*****
You have To put alert in scripts section
// @yield('scripts')
*****
// Display a warning toast, with no title
toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')

// Display a success toast, with a title
toastr.success('Have fun storming the castle!', 'Miracle Max Says')

// Display an error toast, with a title
toastr.error('I do not think that word means what you think it means.', 'Inconceivable!')

// Immediately remove current toasts without using animation
toastr.remove()

// Remove current toasts using animation
toastr.clear()

// Override global options
toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
```

### Notification to [ 'dashboard' , 'email' ]

```jsx
(new \MainHelper)->notify_user([
      'user_id'=>2,
      'message'=>"محتوى الإشعار" ,
      'url'=>"http://example.com",
			'methods'=>['database','mail']
]);
```

### Editor with and without file-explorer

```jsx
<textarea type="text" name="description" required minlength="3" maxlength="10000" class="form-control editor with-file-explorer" ></textarea>
<textarea type="text" name="description" required minlength="3" maxlength="10000" class="form-control editor"  ></textarea>
```

### Upload Files

```php
#Upload File
$this->store_file([
    'source'=>$request->file,
    'validation'=>"image",
    'path_to_save'=>'/uploads/users/',
    'type'=>'AVATAR', 
    'user_id'=>\Auth::user()->id,
    'resize'=>[500,3000],
    'small_path'=>'small/',
    'visibility'=>'PUBLIC',
    'file_system_type'=>env('FILESYSTEM_DRIVER'),
    'watermark'=>true,
    'compress'=>'auto',
])['filename'];

#Use File
$this->use_hub_file('file_name','type_id','user_id');

#Remove File
$this->remove_hub_file('file_name');
```

### Drag And Drop Feature

```php
# You have to use this code inside @section('scripts')

#for single upload
@include('admin.templates.dropzone',[
		'selector'=>'#file-uploader-nafezly-main',
		'url'=> route('admin.upload.file'),
		'method'=>'POST',
		'remove_url'=>route('admin.upload.remove-file'),
		'remove_method'=>'POST',
		'enable_selector_after_upload'=>'#submitEvaluation',
		'max_files'=>1,
		'max_file_size'=>'50',
		'accepted_files'=>"['image/*']"
])

#for multiplue uploads
@include('admin.templates.dropzone',[
		'selector'=>'#file-uploader-nafezly-second',
		'url'=> route('admin.upload.file'),
		'method'=>'POST',
		'remove_url'=>route('admin.upload.remove-file'),
		'remove_method'=>'POST',
		'enable_selector_after_upload'=>'#submitEvaluation',
		'max_files'=>100,
		'max_file_size'=>'50',
		'accepted_files'=>"['image/*']"
])
```

```jsx
/* You have To import this code inside */

/*for single upload*/
<div class="col-12  px-0 mt-2 px-0">
    <div class="col-12 mt-2" style="overflow: hidden">
        <div class="col-12 px-0" id="file-uploader-nafezly-main">
            <input name="file" type="file" multiple class="file-uploader-files" data-fileuploader-files="" style="opacity: 0" data-fileuploader-listInput="fileuploader-list-file-main" />
        </div> 
    </div>
 </div>

/*for multiple uploads*/
<div class="col-12  px-0 mt-2 px-0">
    <div class="col-12 mt-2" style="overflow: hidden">
        <div class="col-12 px-0" id="file-uploader-nafezly-second">
            <input type="hidden" name="uploaded_files" value="" class="file-uploader-uploaded-files">
            <input name="file" type="file" multiple class="file-uploader-files" data-fileuploader-files="" style="opacity: 0" />
        </div>
    </div>
 </div>
```

### Fancybox

```jsx
/* Just Add this Tag To image */
<img src="" data-fancybox />

/* Every image inside this class "data-fancybox" will be converted to fancy */
<div class="fancybox">
		<img src="" />
</div>
```

### Configrations .env

```php
FILESYSTEM_DRIVER=local
STORAGE_BASE=/storage
STORAGE_URL="${STORAGE_BASE}"

DEFAULT_IMAGE="${APP_URL}/images/default/image.jpg"
DEFAULT_IMAGE_FAVICON="${APP_URL}/images/default/favicon.png"
DEFAULT_IMAGE_AVATAR="${APP_URL}/images/default/avatar.png"
DEFAULT_IMAGE_LOGO="${APP_URL}/images/default/logo.png"
DEFAULT_IMAGE_WIDELOGO="${APP_URL}/images/default/wide-logo.png"
DEFAULT_IMAGE_COVER="${APP_URL}/images/default/cover.png"
DEFAULT_IMAGE_NOTIFICATION="${APP_URL}/images/default/notification.png"

DEFAULT_EMAIL=admin@admin.com
DEFAULT_PASSWORD=password
```

### Validate Form

```html
/* just add this id  to form like this */
<form id="validate-form"></form>

/*or add this code to the end of the page */

<form id="custom-validation"></form>
@section('content')
<script type="text/javascript">
	$("#custom-validation").validate();
</script>
@endsection
```

### Controlling Accessibility To files Viewer

```php
# controlling Accessibility To files Viewer

$files = \App\Models\HubFile::where(function($q){
		//conditions here
})->orderBy('id','DESC')->simplePaginate(24); 
return view('livewire.files-viewer',compact('files'));
```
