@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-files"></span> مدير الملفات
				</div>
				<div class="col-12 col-lg-4 p-0">
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
			<div class="col-12 p-0" style="min-width:1100px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الملف</th>
						<th>مستخدم في</th> 
						<th>تاريخ الرفع</th> 
						<th>تحكم</th>
					</tr>
				</thead>  
				<tbody>
					@foreach($files as $file)
					<tr>
						<td>{{$file->id}}</td>
						 
						<td class="text-truncate d-flex">
							@if( in_array($file->extension, ['jpg','jpeg','gif','png','webp']))
							<div class="col-auto p-1">
							<img src="{{$file->getUrl()}}" style="width:60px;display: inline-block;" class="mx-2">
							</div>
							@endif
							<div class="col-auto p-1">
							<a href="{{$file->getUrl()}}" style="display: inline-block;" target="_blank">
							 <span class="fas fa-link mx-1"></span>	الرابط
							</a>
							<br>
							@if($file->views!=0)
							 <span class="fas fa-search mx-1"></span>	{{$file->views}}
							 <br>
							@endif
							@if($file->last_access!=null)
							 <span class="fas fa-clock mx-1"></span>آخر دخول {{\Carbon::parse($file->last_access)->diffForHumans()}}
							 <br>
							@endif
							 <i class="fas fa-box-open mx-1"></i>	{{ number_format($file->size / (1024), 2)}} KB
							</div>
						</td>
					 
							
							 
						<td>{{$file->type}} - {{$file->type_id}}</td>
					    <td>{{$file->created_at}}</td>
						<td style="width: 180px;">

							@can('hub-files-read')
							<a href="{{$file->getUrl()}}" target="_blank">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1 py-1 px-2">
								<span class="fas fa-eye "></span> عرض
							</span>
							</a>
							@endcan
							@can('hub-files-delete')
							<form method="POST" action="{{route('admin.files.destroy',$file)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1 py-1 px-2" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>
							@endcan
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$files->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
