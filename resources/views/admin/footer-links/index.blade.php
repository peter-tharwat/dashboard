@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-link"></span> روابط الفوتر
				</div>
				<div class="col-12 col-lg-4 p-2">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					<a href="{{route('admin.footer-links.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
					</a>
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... ">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">
				
			


			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>العنوان</th>
						<th>الرابط</th>
						<th>تحكم</th>
					</tr>
				</thead> 

				<tbody  id="sortable-table">
					@foreach($footer_links as $footer_link)
					<tr >
						<td class="ui-state-default drag-handler" data-taskid="{{$footer_link->id}}">{{$footer_link->id}}</td>
						<td>{{$footer_link->title_ar}}</td>
						<td>{{$footer_link->url_ar}}</td>
				 
						<td style="width: 180px;">
							@if(auth()->user()->has_access_to('update',$footer_link))
							<a href="{{route('admin.footer-links.edit',$footer_link)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
							</a>
							@endif
							@if(auth()->user()->has_access_to('delete',$footer_link))
							<form method="POST" action="{{route('admin.footer-links.destroy',$footer_link)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$footer_links->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js" integrity="sha512-zYXldzJsDrNKV+odAwFYiDXV2Cy37cwizT+NkuiPGsa9X1dOz04eHvUWVuxaJ299GvcJT31ug2zO4itXBjFx4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
new Sortable(document.getElementById('sortable-table'), {
    multiDrag: true, // Enable multi-drag
	selectedClass: 'selected', // The class applied to the selected items
	fallbackTolerance: 3, // So that we can select items on mobile
	animation: 150,
	onEnd: function(/**Event*/evt) {
		
		var new_order=[];
		var order_classes = document.getElementsByClassName('ui-state-default drag-handler');
		for (var i = 0; i < order_classes.length; i++) {
			new_order[i]=$(order_classes[i]).attr('data-taskid'); 
		}
		$.ajax({
			method:"POST",
			url:"{{route('admin.footer-links.order')}}",
			data:{order:new_order,_token:'{{csrf_token()}}'}
		}); 
		
	}
});
</script>
@endsection