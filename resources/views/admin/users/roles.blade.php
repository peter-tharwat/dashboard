@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-5 p-0 ">
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.roles.update',$user)}}">
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-12 p-0 card">

			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> {{ __('lang.user_permissions') }}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">

				<div class="col-12 p-2">
					<div class="col-12">
						{{ __('lang.permission') }}
					</div>
					<div class="col-12 pt-3">
						<select class="form-control select2-select" name="roles[]" multiple >
							@foreach($roles as $role)
								<option value="{{$role->id}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
							@endforeach
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