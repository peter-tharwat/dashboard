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
			<div class="col-12 p-0" style="min-width:1100px;min-height: 600px;">
				
			
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
						 

						<td>
							@can('users-read')
							<a href="{{route('admin.users.show',$user)}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="fas fa-search "></span> عرض
							</span>
							</a>
							@endcan

							
							

							@can('notifications-create')
							<a href="{{route('admin.notifications.index',['user_id'=>$user->id])}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="far fa-bells"></span> الاشعارات
							</span>
							</a>
							<a href="{{route('admin.notifications.create',['user_id'=>$user->id])}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="far fa-bell"></span>
							</span>
							</a> 
							@endcan

							@can('user-roles-update')
							<a href="{{route('admin.users.roles.index',$user)}}">
							<span class="btn btn-outline-primary btn-sm font-small mx-1">
								<span class="fal fa-key "></span> الصلاحيات
							</span>
							</a>
							@endcan
							
							@can('users-update')
							<a href="{{route('admin.users.edit',$user)}}">
							<span class="btn  btn-outline-success btn-sm font-small mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
							</a>
							@endcan
							
						 						 
							@can('users-delete')
							<form method="POST" action="{{route('admin.users.destroy',$user)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-small mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>
							@endcan



							<div class="dropdown d-inline-block">
								<button class="py-1 px-2 btn btn-outline-primary font-small" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
								<span class="fas fa-bars"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 29px, 0px);">
								@can('users-update')
								<li><a class="dropdown-item font-1" href="{{route('admin.users.access',$user)}}"><span class="fal fa-eye"></span> دخول</a></li>
								@endcan

 

								@can('users-update')
								<li><a class="dropdown-item font-1" href="{{route('admin.traffics.logs',['user_id'=>$user->id])}}"><span class="fal fa-boxes"></span> مراقبة النشاط <span class="badge bg-danger">{{$user->logs_count}}</span></a></li>
								@endcan
								</ul>
								</div>


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
