@extends('layouts.admin')
@section('content')
<div class="card">
	<div class="card-header">
	  <div class="d-flex justify-content-between mb-3">
		<h5 class="card-title mb-0">{{ __('lang.statistics') }}</h5>
	  </div>
	</div>
	<div class="card-body">
	  <div class="row gy-3">
		<div class="col-md-3 col-6">
		  <div class="d-flex align-items-center">
			<div class="badge rounded-pill bg-label-primary me-3 p-2">
			  <i class="ti ti-users ti-lg"></i>
			</div>
			<div class="card-info">
			  <h5 class="mb-0">{{\App\Models\User::count()}}</h5>
			  <small>{{ __('lang.users') }}</small>
			</div>
		  </div>
		</div>
		<div class="col-md-3 col-6">
		  <div class="d-flex align-items-center">
			<div class="badge rounded-pill bg-label-primary me-3 p-2">
			  <i class="ti ti-bell ti-lg"></i>
			</div>
			<div class="card-info">
			  <h5 class="mb-0">{{auth()->user()->unreadNotifications->count()}}</h5>
			  <small>{{ __('lang.notifications') }}</small>
			</div>
		  </div>
		</div>
		<div class="col-md-3 col-6">
		  <div class="d-flex align-items-center">
			<div class="badge rounded-pill bg-label-primary me-3 p-2">
			  <i class="ti ti-writing ti-lg"></i>
			</div>
			<div class="card-info">
			  <h5 class="mb-0">{{\App\Models\Article::count()}}</h5>
			  <small>
				{{ __('lang.articles') }}
			  </small>
			</div>
		  </div>
		</div>
		<div class="col-md-3 col-6">
			<div class="d-flex align-items-center">
			  <div class="badge rounded-pill bg-label-primary me-3 p-2">
				<i class="ti ti-tags ti-lg"></i>
			  </div>
			  <div class="card-info">
				<h5 class="mb-0">{{\App\Models\Category::count()}}</h5>
				<small>{{ __('lang.categories') }}</small>
			  </div>
			</div>
		  </div>
		  <div class="col-md-3 col-6">
			<div class="d-flex align-items-center">
			  <div class="badge rounded-pill bg-label-primary me-3 p-2">
				<i class="ti ti-files ti-lg"></i>
			  </div>
			  <div class="card-info">
				<h5 class="mb-0">{{\App\Models\HubFile::count()}}</h5>
				<small>{{ __('lang.files') }}</small>
			  </div>
			</div>
		  </div>
		  <div class="col-md-3 col-6">
			<div class="d-flex align-items-center">
			  <div class="badge rounded-pill bg-label-primary me-3 p-2">
				<i class="ti ti-menu-2 ti-lg"></i>
			  </div>
			  <div class="card-info">
				<h5 class="mb-0">{{\App\Models\Menu::count()}}</h5>
				<small>{{ __('lang.menus') }}</small>
			  </div>
			</div>
		  </div>
		  <div class="col-md-3 col-6">
			<div class="d-flex align-items-center">
			  <div class="badge rounded-pill bg-label-primary me-3 p-2">
				<i class="ti ti-currency-dollar ti-lg"></i>
			  </div>
			  <div class="card-info">
				<h5 class="mb-0">{{\App\Models\Page::count()}}</h5>
				<small>{{ __('lang.pages') }}</small>
			  </div>
			</div>
		  </div>
		  <div class="col-md-3 col-6">
			<div class="d-flex align-items-center">
			  <div class="badge rounded-pill bg-label-primary me-3 p-2">
				<i class="ti ti-phone ti-lg"></i>
			  </div>
			  <div class="card-info">
				<h5 class="mb-0">{{\App\Models\Contact::count()}}</h5>
				<small>{{ __('lang.contacts') }}</small>
			  </div>
			</div>
		  </div>
		  <div class="col-md-3 col-6">
			<div class="d-flex align-items-center">
			  <div class="badge rounded-pill bg-label-primary me-3 p-2">
				<i class="ti ti-currency-dollar ti-lg"></i>
			  </div>
			  <div class="card-info">
				<h5 class="mb-0">{{\App\Models\Announcement::count()}}</h5>
				<small>{{ __('lang.announcements') }}</small>
			  </div>
			</div>
		  </div>
		  
	  </div>
	</div>
  </div>
  <br>
  <hr>
  <br>
  <livewire:dashboard-statistics />

  
{{--

<div class="col-12 px-2 py-2">
</div>
</div>
 --}}@endsection