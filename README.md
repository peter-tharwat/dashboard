# مزايا لوحة التحكم


- ✅ مهيئة للسيو بشكل تلقائي وذكي
- ✅ جاهزة لعرض اشعارات مع صور
- ✅ عرض التنبيهات بشكل لطيف
- ✅ عرض الأخطاء بشكل لحظي وتلقائي
- ✅ طريقة لعرض الصور باحترافية
- ✅ تدعم السحب والافلات
- ✅ الاشعارات في الوقت الفعلي
- ✅ أيقونات مدفوعة بشكل مجاني
- ✅ أفضل وأجمل الخطوط العربية
- ✅ اعدادات Robots جاهزة
- ✅ منشئ SiteMap تلقائي
- ✅ جاهزة للتحويل إلى تطبيق هاتف
- ✅ جميع الصفحات الأساسية وأكثر
- ✅ احصائيات رائعة في لوحة التحكم
- ✅ امكانية انشاء قوائم وتحديد أماكنها
- ✅ امكانية ترتيب الروابط داخل القوائم
- ✅ امكانية انشاء صفحات مخصصة
- ✅ نظام اعلانات جاهز
- ✅ مدونة متكاملة أقسام،مقالات ..
- ✅ نظام تحويل الروابط
- ✅ عربية بالكامل !
- ✅ محرر جميل مع امكانية رفع صور
- ✅ نظام مستخدمين ولهم صور
- ✅ متجاوبة بالكامل
- ✅ تستخدم آخر اصدار Laravel
- ✅ تستخدم آخر اصدار Bootstrap
- ✅ الاشعارات في الوقت الفعلي
- ✅ راصد الأخطاء الذكي
- ✅ نظام تتبع شامل
- ✅ اضافة حدود الزيارات لزيادة الحماية
- ✅ صفحات 404 مخصصة
- ✅ صفحات الدخول والتسجيل وغيرها
- ✅ نظام اعدادات الموقع
- ✅ جاهزة للدمج مع كلاود فلاير
- ✅ نظام متابعة ذكي
- ✅ نظام صلاحيات متقدم
- ✅ مرفق نماذج لصناعة الصفحات
- ✅ نظام التذاكر للتواصل معنا
- ✅ نظام Plugins جاهز لاضافة المزيد
- ✅ المزيد 


### Screenshots


![screenshots/25.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/25.jpg)
![screenshots/18.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/18.jpg)
![screenshots/19.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/19.jpg)
![screenshots/20.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/20.jpg)
![screenshots/24.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/24.jpg)
![screenshots/6.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/6.jpg)
![screenshots/7.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/7.jpg)
![screenshots/8.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/8.jpg)
![screenshots/9.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/9.jpg)
![screenshots/10.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/10.jpg)
![screenshots/11.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/11.jpg)
![screenshots/12.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/12.jpg)
![screenshots/13.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/13.jpg)
![screenshots/14.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/14.jpg)
![screenshots/15.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/15.jpg)
![screenshots/16.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/16.jpg)
![screenshots/17.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/17.jpg)



<!-- - ✅ Auto & Smart Seo
- ✅ Optimized Notifications With Images
- ✅ Smart Alerts
- ✅ Auto Js Validations
- ✅ Front End Alert
- ✅ Nice Image Viewing FancyBox
- ✅ Drag And drop Feature
- ✅ Fully Arabic 😀
- ✅ Smart Editor With Upload Images
- ✅ Select from Already uploaded Files
- ✅ Fully Profile System With Avatars ( Can Resize Avatar )
- ✅ Fully Responsive
- ✅ Intervally Getting Notifcations Out Of The Box
- ✅ FontAwesome PRO 💥 + ResponsiveFonts + Noto Sans Arabic fonts Included
- ✅ Robots.txt , SiteMapGenerator , manifest.json
- ✅ General Statistics On Home Page ( Traffic , New Users , Top Pages , Top Browsers , Top Devices , Top OSs , Top Ips , Top Users , and so on ... )
- ✅ basic pages ( contact , articles , privacy , terms , about , categories , redirections )
- ✅ You can Create Menus With Links ( can change order by Drag And drop )
- ✅ Ability to Create custom pages
- ✅ Smart Error Listeners
- ✅ Smart Traffic tracker
- ✅ RateLimit Plugin
- ✅ Custom 404 Page
- ✅ Nice Login , Register and Confirm Email Pages
- ✅ Most Common Settings
- ✅ Ready to integrate CloudFlare Firewall
- ✅ Smart Logging System -->
    
 

### How to setup

```bash
#dont forget to install 
sudo apt-get install php-imagick
composer install
# copy .env.example to .env
cp .env.example .env
# generate security key , link storage file
php artisan key:generate
php artisan storage:link
# after connect your database via .env file
php artisan migrate:fresh
php artisan db:seed

# dont forget to start queuing and run schedule on the background 
php artisan queue:work && php artisan schedule:run 
```

### Credentials

```
login page : <http://127.0.0.1:8000/login>
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
    'optimize'=>true,
])['filename'];

#Use File
$this->use_hub_file('file_name','type_id','user_id');
#use multiple files
$uploaded_files=json_decode($request["fileuploader-list-attachment"]);
$attachments=[];foreach($uploaded_files as $uploaded_file)array_push($attachments, $uploaded_file->file);
foreach($attachments as $attachment)
     $this->use_hub_file($attachment, $item->id, auth()->user()->id);

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
            <input type="hidden" disabled class="file-uploader-uploaded-files">
				    <input name="attachment" type="file" multiple class="file-uploader-files" data-fileuploader-files="" style="opacity: 0" />
							<!--
							# for rendering old uploaded files 
							<input name="attachment" type="file" multiple class="file-uploader-files" data-fileuploader-files='@include('site-templates.uploaded-files-array',['files'=>$item->uploaded_files()])' style="opacity: 0" />
							# uploaded_files => is a laravel collection 
							-->
        </div> 
    </div>
 </div>

/*for multiple uploads*/
<div class="col-12  px-0 mt-2 px-0">
    <div class="col-12 mt-2" style="overflow: hidden">
        <div class="col-12 px-0" id="file-uploader-nafezly-second">
           <input type="hidden" disabled class="file-uploader-uploaded-files">
				   <input name="attachment" type="file" multiple class="file-uploader-files" data-fileuploader-files="" style="opacity: 0" />
						<!--
							# for rendering old uploaded files 
							<input name="attachment" type="file" multiple class="file-uploader-files" data-fileuploader-files='@include('site-templates.uploaded-files-array',['files'=>$item->uploaded_files()])' style="opacity: 0" />
							# uploaded_files => is a laravel collection 
							-->
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

```jsx
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

```jsx
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
