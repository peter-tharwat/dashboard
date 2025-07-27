@extends('layouts.admin')
@section('content')

<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row ">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-contacts"></span> الاعلانات
				</div>
				<div class="col-12 col-lg-4 py-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('announcements-create')
		 			<a href="{{route('admin.announcements.create')}}">
		 				<button class="btn btn-primary pb-2"><span class="fas fa-plus"></span> إضافة إعلان</button>
		 			</a>
		 			@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row justify-content-between">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
			<div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			
	 		</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;min-height:50dvh">
				
			
			<table class="table table-bordered  table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">العنوان</th>
		      <th scope="col">الوصف</th>
		      <th scope="col">الرابط</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($announcements as $announcement)
		    <tr>
		      <td scope="col">{{$announcement->id}}</td>
		      <td scope="col">{{$announcement->title}}</td>
		      <td scope="col">{{$announcement->description}}</td>
		      <td scope="col"><a href="{{$announcement->url}}" target="_block">{{$announcement->url}}</a></td>
		      <td style="width: 1%;text-wrap: nowrap;">




		      	@include('components.control',[
            		'links'=>[
            			[
            				'text'=>"تعديل",
            				'icon'=>"fal fa-edit",
            				'can'=>"announcements-update",
            				'url'=>route('admin.announcements.edit',['announcement'=>$announcement])
            			],
            			[
            				'text'=>"حذف",
            				'icon'=>"fal fa-trash-can",
            				'can'=>'announcements-delete',
            				'url'=>route('admin.announcements.destroy',['announcement'=>$announcement]),
            				'method'=>"DELETE",
            			],
            		]
            	])


		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
		<div class="col-12 px-0 py-2">
			{{$announcements->appends(request()->query())->render() }}
		</div>
	 </div> 
</div>
@endsection
