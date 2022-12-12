@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.permissions.update',$user)}}">
		@csrf
		@method("PUT")
		<div class="col-12 col-lg-12 p-0 main-box">

			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> صلاحيات المستخدم
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				{{-- {{dd($permissions)}} --}}
				<table class="table table-hover" style="width:400px">
					<thead>
						<tr style="">
							<th>الجدول</th>
							<th style="width: 56px;">اضافة</th>
							<th style="width: 56px;">عرض</th>
							<th style="width: 56px;">تعديل</th>
							<th style="width: 56px;">حذف</th>
						</tr>
					</thead>
					<tbody>
						@foreach($permissions as $permission)
						@php
						$sub_permissions = \Spatie\Permission\Models\Permission::where('table',$permission->table)->get();
						@endphp
						<tr>
							
						 

							<td>{{$permission->table}}</td>

							@if($sub_permissions->where('name',$permission->table.'-create')->first())
							<td style="width: 56px;">
								 
								<div class="form-check form-switch">
								  <input class="form-check-input" type="checkbox" id="{{$permission->table.'-create'}}" value="{{$permission->table.'-create'}}" @if($user->hasPermission($permission->table.'-create')) checked @endif name="permissions[]">
								</div>
							</td>
							@else
							<td style="width: 56px;">
							</td>
							@endif
							@if($sub_permissions->where('name',$permission->table.'-read')->first())
							<td style="width: 56px;">
								 
								<div class="form-check form-switch">
								  <input class="form-check-input" type="checkbox" id="{{$permission->table.'-read'}}" value="{{$permission->table.'-read'}}" @if($user->hasPermission($permission->table.'-read')) checked @endif name="permissions[]">
								</div>
							</td>
							@else
							<td style="width: 56px;">
							</td>
							@endif
							@if($sub_permissions->where('name',$permission->table.'-update')->first())
							<td style="width: 56px;">
								 
								<div class="form-check form-switch">
								  <input class="form-check-input" type="checkbox" id="{{$permission->table.'-update'}}" value="{{$permission->table.'-update'}}" @if($user->hasPermission($permission->table.'-update')) checked @endif name="permissions[]">
								</div>
							</td>
							@else
							<td style="width: 56px;">
							</td>
							@endif
							@if($sub_permissions->where('name',$permission->table.'-delete')->first())
							<td style="width: 56px;">
								 
								<div class="form-check form-switch">
								  <input class="form-check-input" type="checkbox" id="{{$permission->table.'-delete'}}" value="{{$permission->table.'-delete'}}" @if($user->hasPermission($permission->table.'-delete')) checked @endif name="permissions[]">
								</div>
							</td>
							@else
							<td style="width: 56px;">
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			 
			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div> 
		</form>
	</div>
</div>
@endsection