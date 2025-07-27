@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-redirections"></span> التحويلات
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('redirections-create')
					<a href="{{route('admin.redirections.create')}}">
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
						<th>الرابط القديم</th>
						<th>الرابط الجديد</th>
						<th>نوع التحويل</th>
						<th>تحكم</th>
					</tr>
				</thead> 

				<tbody>
					@foreach($redirections as $redirection)
					<tr>
						<td>{{$redirection->id}}</td>
						<td>{{urldecode($redirection->url)}}</td>
						<td>{{urldecode($redirection->new_url)}}</td>
						<td>
							@if($redirection->code==302)
							مؤقت
							@else
							دائم
							@endif
						</td>
						<td style="width: 1%;text-wrap: nowrap;">

							@include('components.control',[
			            		'links'=>[ 
			            			[
			            				'text'=>"تعديل",
			            				'icon'=>"fal fa-edit",
			            				'can'=>"redirections-update",
			            				'url'=>route('admin.redirections.edit',['redirection'=>$redirection])
			            			],
			            			[
			            				'text'=>"حذف",
			            				'icon'=>"fal fa-trash-can",
			            				'can'=>'redirections-delete',
			            				'url'=>route('admin.redirections.destroy',['redirection'=>$redirection]),
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
			{{$redirections->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
