@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-menus"></span> القوائم
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('menus-create')
					<a href="{{route('admin.menus.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
					</a>
					@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;min-height:50dvh">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الرابط</th>
						<th>العنوان</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($menus as $menu)
					<tr>
						<td>{{$menu->id}}</td>
						<td>{{$menu->location}}</td>
						<td>{{$menu->title}}</td>
					 
						<td style="width: 1%;text-wrap: nowrap;">


							@include('components.control',[
			            		'links'=>[
			            			[
			            				'text'=>"الروابط",
			            				'icon'=>"fal fa-edit",
			            				'can'=>"menu-links-read",
			            				'url'=>route('admin.menu-links.index',['menu_id'=>$menu->id])
			            			],
			            			/*[
			            				'text'=>"تعديل",
			            				'icon'=>"fal fa-edit",
			            				'can'=>"menu-links-update",
			            				'url'=>route('admin.menus.edit',$menu)
			            			],
			            			[
			            				'text'=>"حذف",
			            				'icon'=>"fal fa-trash-can",
			            				'can'=>'menu-links-delete',
			            				'url'=>route('admin.menus.destroy',$menu),
			            				'method'=>"DELETE",
			            			],*/
			            		]
			            	])

 

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$menus->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
