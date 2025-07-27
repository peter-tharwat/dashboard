@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
	<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => 'لوحة التحكم' , 'isactive' => false],
			['url' => route('admin.users.index') , 'title' => 'المستخدمين' , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	المستخدمين
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('users-create')
					<a href="{{route('admin.users.create')}}">
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
						<th>نشط</th>
						<th>الاسم</th>
						<th>البريد</th>
						@if(auth()->user()->can('articles-read'))
						<th>المقالات</th>
						@endif
						@if(auth()->user()->can('contacts-read'))
						<th>التذاكر</th>
						@endif
						@if(auth()->user()->can('comments-read'))
						<th>التعليقات</th>
						@endif
						@if(auth()->user()->can('traffics-read'))
						<th>الترافيك</th>
						@endif
						<th>الصلاحيات</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{\Carbon::parse($user->last_activity)->diffForHumans()}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>

						@if(auth()->user()->can('articles-read'))
						<td><a href="{{route('admin.articles.index',['user_id'=>$user->id])}}">{{$user->articles_count}}</a></td>
						@endif
						@if(auth()->user()->can('contacts-read'))
						<td><a href="{{route('admin.contacts.index',['user_id'=>$user->id])}}">{{$user->contacts_count}}</a></td>
						@endif
						@if(auth()->user()->can('comments-read'))
						<td><a href="{{route('admin.article-comments.index',['user_id'=>$user->id])}}">{{$user->comments_count}}</a></td>
						@endif
						@if(auth()->user()->can('traffics-read'))
						<td><a href="{{route('admin.traffics.logs',['user_id'=>$user->id])}}">{{$user->logs_count}}</a></td>
						@endif


						<td>@foreach($user->roles as $role) {{$role->display_name}}<br> @endforeach</td>
						 

						<td style="width: 1%;text-wrap: nowrap;">



							@include('components.control',[
			            		'links'=>[

			            			[
	                                    'text'=>"عرض",
	                                    'icon'=>"fal fa-search",
	                                    'can'=>"users-read",
	                                    'url'=>route('admin.users.show',['user'=>$user])
	                                ],
	                                [
			            				'text'=>"الاشعارات",
			            				'icon'=>"fal fa-bells",
			            				'can'=>"notifications-read",
			            				'url'=>route('admin.notifications.index',['user_id'=>$user->id])
			            			],
			            			[
			            				'text'=>"ارسال اشعار",
			            				'icon'=>"fal fa-bell",
			            				'can'=>"notifications-create",
			            				'url'=>route('admin.notifications.create',['user_id'=>$user->id])
			            			],
			            			[
			            				'text'=>"الصلاحيات",
			            				'icon'=>"fal fa-key",
			            				'can'=>"user-roles-update",
			            				'url'=>route('admin.users.roles.index',$user)
			            			],
			            			[
			            				'text'=>"تعديل",
			            				'icon'=>"fal fa-edit",
			            				'can'=>"users-update",
			            				'url'=>route('admin.users.edit',['user'=>$user])
			            			],
	                                [
			            				'text'=>"دخول",
			            				'icon'=>"fal fa-eye",
			            				'can'=>"users-update",
			            				'url'=>route('admin.users.access',$user)
			            			],
			            			[
			            				'text'=>"<div class='spinner-grow text-success' role='status' style='width:15px;height:15px'></div> مراقبة النشاط",
			            				'icon'=>"fal fa-boxes",
			            				'can'=>"users-update",
			            				'url'=>route('admin.traffics.logs',['user_id'=>$user->id]),
			            				/*'notification'=>$user->logs_count*/
			            			],
			            			[ 
			            				'text'=>"حذف",
			            				'icon'=>"fal fa-trash-can",
			            				'can'=>'users-delete',
			            				'url'=>route('admin.users.destroy',['user'=>$user]),
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
			{{$users->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
