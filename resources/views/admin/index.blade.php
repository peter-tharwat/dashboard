@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	@can('viewAny',\App\Models\User::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #fffced;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;
				height: 64px;border-radius: 50%;">
				<span class="fal fa-users font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">المستخدمين</h6>
			<h6 class="font-3">{{\App\Models\User::count()}}</h6>
		</div>
	</div>
</div>
@endcan
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
				<span class="fal fa-bells font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الإشعارات</h6>
			<h6 class="font-3">{{auth()->user()->unreadNotifications->count()}}</h6>
		</div>
	</div>
</div>
@can('viewAny',\App\Models\Article::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #edffff;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
				<span class="fal fa-books font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">المقالات</h6>
			<h6 class="font-3">{{\App\Models\Article::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Category::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #d2ecff;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
				<span class="fal fa-tag font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الأقسام</h6>
			<h6 class="font-3">{{\App\Models\Category::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\HubFile::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #fffced;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
				<span class="fal fa-file font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الملفات</h6>
			<h6 class="font-3">{{\App\Models\HubFile::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Menu::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #f3ffed;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
				<span class="fal fa-list font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">القوائم</h6>
			<h6 class="font-3">{{\App\Models\Menu::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Page::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #edffff;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
				<span class="fal fa-file-invoice font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الصفحات</h6>
			<h6 class="font-3">{{\App\Models\Page::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Contact::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #edffff;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
				<span class="fal fa-phone font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">التواصل</h6>
			<h6 class="font-3">{{\App\Models\Contact::count()}}</h6>
		</div>
	</div>
</div>
@endcan
@can('viewAny',\App\Models\Announcement::class)
<div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-2 mb-3">
	<div class="col-12 px-0 py-2 d-flex rounded-3 main-box-wedit" style="background: #edffff;">
		<div style="width: 80px;" class="p-2">
			<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0,0,0,.04),rgba(0,0,0,.04))!important;height: 64px;border-radius: 50%;">
				<span class="fal fa-bullhorn font-5" ></span>
			</div>
		</div>
		<div style="width: calc(100% - 80px)" class="px-2 py-2">
			<h6 class="font-1">الإعلانات</h6>
			<h6 class="font-3">{{\App\Models\Announcement::count()}}</h6>
		</div>
	</div>
</div>
@endcan
<livewire:dashboard-statistics />
</div>
@endsection