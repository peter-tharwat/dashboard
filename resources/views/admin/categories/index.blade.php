@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-categories"></span> الأقسام
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('categories-create')
					<a href="{{route('admin.categories.create')}}">
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
			<div class="col-12 p-0" style="min-width:1100px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						
						<th>الشعار</th>
						<th>العنوان</th>
						<th>المقالات</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>

						<td><img src="{{$category->image()}}" style="width:40px"></td>
						<td>{{$category->title}}</td>
					 	<td><a href="{{route('admin.articles.index',['category_id'=>$category->id])}}">{{$category->articles_count}}</a></td>

						<td style="width: 180px;">
							@can('categories-update')
							<a href="{{route('admin.categories.edit',$category)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
							</a>
							@endcan
							@can('categories-delete')
							<form method="POST" action="{{route('admin.categories.destroy',$category)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
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
			{{$categories->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
