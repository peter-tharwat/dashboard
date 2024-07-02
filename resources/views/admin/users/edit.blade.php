@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.update',$user)}}">
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-8 p-0 card">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> {{ __('lang.edit_user') }}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('lang.name') }}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3"  maxlength="190" class="form-control" value="{{$user->name}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('lang.email') }}
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email"  class="form-control"  value="{{$user->email}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('lang.password') }}
				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password"  class="form-control"  minlength="8" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('lang.profile_image') }}
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="avatar"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">
					<img src="{{$user->getUserAvatar()}}" style="width:100px;margin-top:20px">
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('lang.phone') }}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="phone"   maxlength="190" class="form-control"  value="{{$user->phone}}" >
				</div>
			</div>
			@if(auth()->user()->can('user-roles-update'))
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('lang.roles') }}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="roles[]" multiple required>
						@foreach($roles as $role)
							<option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->display_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@endif
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('lang.bio') }}
				</div>
				<div class="col-12 pt-3">
					<textarea  name="bio" maxlength="5000" class="form-control" style="min-height:150px">{{$user->bio}}</textarea>
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('lang.blocked') }}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" name="blocked">
						<option @if($user->blocked=="0") selected @endif value="0">{{ __('lang.no') }}</option>
						<option @if($user->blocked=="1") selected @endif value="1">{{ __('lang.yes') }}</option>
					</select>
				</div>
			</div>
			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">{{ __('lang.save') }}</button>
		</div> 
		</form>
	</div>
</div>
@endsection