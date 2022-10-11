@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.permissions.update',$user)}}">
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-6 p-0 main-box">

			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> صلاحيات المستخدم
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				{{-- <table class="table">
					<tbody>
						@foreach($permissions as $permission)
						<tr>
							<td>{{$permission->name}}</td>
							<td>
								{{$permission->name}}
								<div class="form-check form-switch">
								  <input class="form-check-input" type="checkbox" id="{{$permission->name}}" value="{{$permission->name}}" @if(auth()->user()->hasPermission($permission->name)) checked @endif name="permissions[]">
								</div>
							</td>
							<td>
								{{$permission->name}}
								<div class="form-check form-switch">
								  <input class="form-check-input" type="checkbox" id="{{$permission->name}}" value="{{$permission->name}}" @if(auth()->user()->hasPermission($permission->name)) checked @endif name="permissions[]">
								</div>
							</td>
							<td>
								{{$permission->name}}
								<div class="form-check form-switch">
								  <input class="form-check-input" type="checkbox" id="{{$permission->name}}" value="{{$permission->name}}" @if(auth()->user()->hasPermission($permission->name)) checked @endif name="permissions[]">
								</div>
							</td>
							<td>
								{{$permission->name}}
								<div class="form-check form-switch">
								  <input class="form-check-input" type="checkbox" id="{{$permission->name}}" value="{{$permission->name}}" @if(auth()->user()->hasPermission($permission->name)) checked @endif name="permissions[]">
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table> --}}
			@foreach($permissions as $permission)
			<div class="col-12 col-lg-6 p-2 row d-flex align-items-center">
				<div class="col-9">
					<label class="form-check-label d-flex justify-content-end" for="{{$permission->name}}">{{$permission->name}}</label>
				</div>
				<div class="col-3 pt-3">
					<div class="form-check form-switch">
					  <input class="form-check-input" type="checkbox" id="{{$permission->name}}" value="{{$permission->name}}" @if(auth()->user()->hasPermission($permission->name)) checked @endif name="permissions[]">
					</div>
				</div>
			</div>
			@endforeach
			 
			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div> 
		</form>
	</div>
</div>
@endsection