@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<h4 class="py-3 mb-4">{{ __('lang.users') }}</h4>
	<div class="d-flex justify-content-between">
		<div>
			@can('roles-create')
			<a href="{{route('admin.users.create')}}">
			<span class="btn btn-primary"><span class="fas fa-plus"></span> {{ __('lang.add_new') }}</span>
			</a>
			@endcan
		</div>
		<form method="GET">
			<input type="text" name="q" class="form-control" placeholder="{{ __('lang.search') }}" value="{{request()->get('q')}}">
		</form>
	</div>
	<br>
	<div>
		<div class="card">
			<div class="table-responsive text-nowrap">
				<table class="table table-bordered  table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>{{ __('lang.active') }}</th>
							<th>{{ __('lang.name') }}</th>
							<th>{{ __('lang.email') }}</th>
							@if(auth()->user()->can('articles-read'))
							<th>{{ __('lang.articles') }}</th>
							@endif
							@if(auth()->user()->can('contacts-read'))
							<th>{{ __('lang.tickets') }}</th>
							@endif
							@if(auth()->user()->can('comments-read'))
							<th>{{ __('lang.comments') }}</th>
							@endif
							@if(auth()->user()->can('traffics-read'))
							<th>{{ __('lang.trafic') }}</th>
							@endif
							<th>{{ __('lang.roles') }}</th>
							<th>{{ __('lang.control') }}</th>
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
									<span class="fas fa-search "></span> {{ __('lang.show') }}
								</span>
								</a>
								@endcan
	
								
								
	
								@can('notifications-create')
								<a href="{{route('admin.notifications.index',['user_id'=>$user->id])}}">
								<span class="btn  btn-outline-primary btn-sm font-small mx-1">
									<span class="far fa-bells"></span> {{ __('lang.notifications') }}
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
									<span class="fal fa-key "></span> {{ __('lang.roles') }}
								</span>
								</a>
								@endcan
								
								@can('users-update')
								<a href="{{route('admin.users.edit',$user)}}">
								<span class="btn  btn-outline-success btn-sm font-small mx-1">
									<span class="fas fa-wrench "></span> {{ __('lang.control') }}
								</span>
								</a>
								@endcan
								
													  
								@can('users-delete')
								<form method="POST" action="{{route('admin.users.destroy',$user)}}" class="d-inline-block">@csrf @method("DELETE")
									<button class="btn  btn-outline-danger btn-sm font-small mx-1" onclick="var result = confirm('{{ __('lang.are_you_sure_for_delete') }} ؟');if(result){}else{event.preventDefault()}">
										<span class="fas fa-trash "></span> {{ __('lang.delete') }}
									</button>
								</form>
								@endcan
	
	
	
								<div class="dropdown d-inline-block">
									<button class="py-1 px-2 btn btn-outline-primary font-small" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
									<span class="fas fa-bars"></span>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 29px, 0px);">
									@can('users-update')
									<li><a class="dropdown-item font-1" href="{{route('admin.users.access',$user)}}"><span class="fal fa-eye"></span> {{ __('lang.entry') }}</a></li>
									@endcan
	
	 
	
									@can('users-update')
									<li><a class="dropdown-item font-1" href="{{route('admin.traffics.logs',['user_id'=>$user->id])}}"><span class="fal fa-boxes"></span>
										{{ __('lang.activity_monitoring') }}
										<span class="badge bg-danger">{{$user->logs_count}}</span></a></li>
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
		<br>
		{{$users->appends(request()->query())->render()}}
	</div>
@endsection
