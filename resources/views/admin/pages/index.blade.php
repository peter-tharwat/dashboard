@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-pages"></span> الصفحات
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('pages-create')
					<a href="{{route('admin.pages.create')}}">
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
						<th>المستخدم</th>
						<th>الرابط</th>
						<th>الشعار</th>
						<th>العنوان</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pages as $page)
					<tr>
						<td>{{$page->id}} @if($page->home)<span class="far fa-home"></span>@endif</td>
						<td>{{$page->user->name}}</td>
						<td>{{$page->slug}}</td>
						<td><img src="{{$page->image()}}" style="width:40px"></td>
						<td>{{$page->title}}</td>
					 
						<td style="width: 1%;text-wrap: nowrap;" >


							@include('components.control',[
			            		'links'=>[

			            			[
                                        'text'=>"عرض",
                                        'icon'=>"fal fa-search",
                                        'can'=>"pages-read",
                                        'url'=>route('page.show',['page'=>$page])
                                    ],

			            			[
			            				'text'=>"صمم",
			            				'icon'=>"fal fa-brush",
			            				'can'=>"pages-update",
			            				'url'=>route('admin.pages.builder-edit',['page'=>$page])
			            			],
			            			[
			            				'text'=>"تعديل",
			            				'icon'=>"fal fa-edit",
			            				'can'=>"pages-update",
			            				'url'=>route('admin.pages.edit',['page'=>$page])
			            			],
			            			[
			            				'visible'=>$page->removable,
			            				'text'=>"حذف",
			            				'icon'=>"fal fa-trash-can",
			            				'can'=>'pages-delete',
			            				'url'=>route('admin.pages.destroy',['page'=>$page]),
			            				'method'=>"DELETE",
			            			],
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
			{{$pages->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
