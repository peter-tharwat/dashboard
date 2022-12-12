@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-comments"></span> عرض الكل
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
						<th>المستخدم</th>
						<th>تمت المراجعة</th>
						<th>المحتوى</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody id="sortable-table">
					@foreach($comments as $comment)
					<tr >
						<td class="ui-state-default drag-handler" data-comment="{{$comment->id}}">{{$comment->id}}</td>
						<td>
							<img class="rounded-circle mx-2" alt="" src="{{$comment->user==null?env('DEFAULT_IMAGE_AVATAR'):$comment->user->getUserAvatar()}}"  style="width:20px;height: 20px;" />
							<a href="{{$comment->user==null?'#':route('admin.users.show',$comment->user)}}" class="link-dark">{{$comment->user==null?$comment->adder_name:$comment->user->name}}</a></td>
						<td>
							@if($comment->reviewed==1)
							<span class="fas fa-check-circle text-success" ></span>
							@endif
						</td>
						<td>
							{{$comment->content}}
						</td>
						<td style="width: 270px;">

					 

							@can('comments-update')
							<a href="{{route('admin.article-comments.edit',$comment)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> تحكم
								</span>
							</a>
							@endcan
							@can('comments-delete')
							<form method="POST" action="{{route('admin.article-comments.destroy',$comment)}}" class="d-inline-block">@csrf @method("DELETE")
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
			{{$comments->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection