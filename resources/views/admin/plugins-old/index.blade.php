@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 px-2 ">
	 
		<div class="col-12 px-0 main-box">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					عرض الكل
				</div>
				<div class="col-12 col-lg-4 p-2">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('plugins-create')
					<a href="{{route('admin.plugins.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
					</a>
					@endcan
				</div>
			</div>
			{{-- <div class="col-12 divider" style="min-height: 2px;"></div> --}}
		</div>
	</div>
		<div class="col-12 p-0">
			@php
			$plugins = Module::all();
			@endphp
			@foreach($plugins as $plugin)
			<div class="col-12 col-md-6 col-lg-4 col-xxl-3 p-2 my-3">
				<div class="col-12 main-box p-3 text-center">
					<div class="col-12 p-1 text-center">
						<span class="{{$plugin->get('icon')}} font-10 my-3" style="color:{{$plugin->get('color')}}"></span>
					</div>
					<div class="col-12 p-0">
						<div class="col-12 p-0 font-2 text-center" style="font-weight:bold">
							@if($plugin->isEnabled()) <span class="fas fa-check-circle text-success"></span> @endif {{$plugin->get('title')}}
						</div>
						<div class="col-12 px-0 py-3 text-center" style="text-align: justify;">
							{{$plugin->get('description')}}
						</div>
						<div class="col-12 px-0 py-3 text-center row" style="text-align: justify;">
							@if($plugin->isEnabled())
							<form method="POST" action="{{route('admin.plugins.deactivate',['plugin'=>$plugin->get('name')])}}" class="d-inline-block mb-2 col-lg-12 col-12 p-1 text-center">@csrf
								<button class="btn btn-outline-warning rounded-0 px-4" onclick="var result = confirm('هل أنت متأكد من عملية إلغاء تفعيل الإضافة؟');if(result){}else{event.preventDefault()}">
									الغاء تفعيل الإضافة
								</button>
							</form>
							@else
							<form method="POST" action="{{route('admin.plugins.activate',['plugin'=>$plugin->get('name')])}}" class="d-inline-block mb-2 col-lg-12 col-12 p-1 text-center">@csrf
								<button class="btn btn-outline-success rounded-0 px-4" onclick="var result = confirm('هل أنت متأكد من عملية تفعيل الإضافة؟');if(result){}else{event.preventDefault()}">
									تفعيل الإضافة
								</button>
							</form>
							@endif


							{{-- <form method="POST" action="{{route('admin.plugins.delete',['plugin'=>$plugin->get('name')])}}" class="d-inline-block mb-2 col-12 col-lg-5 p-1">@csrf
								<button class="btn btn-outline-danger rounded-0 px-2 col-12" onclick="var result = confirm('هل أنت متأكد من عملية حذف الإضافة؟');if(result){}else{event.preventDefault()}">
									حذف الإضافة
								</button>
							</form> --}}


						</div>
					</div>
					
				</div>
			</div>
			@endforeach
		</div>
		{{-- <div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">


			</div>
		</div> --}}
	
</div>
@endsection