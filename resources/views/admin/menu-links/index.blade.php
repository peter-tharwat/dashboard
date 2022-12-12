@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-links"></span> الصفحات
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('menu-links-create')
					<a href="{{route('admin.menu-links.create',['menu_id'=>request()->get('menu_id')])}}">
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
				
			
			<table class="table table-bordered  table-hover sortable-table">
				<thead>
					<tr>
						<th>#</th>
						<th>العنوان</th>
						<th>الرابط</th>
						
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody id="sortable-table">
					@foreach($menuLinks as $link)
					<tr>
						<td class="ui-state-default drag-handler" data-linkid="{{$link->id}}">{{$link->id}}</td>
					 
						
						<td>{{$link->title}}</td>
						<td>{{$link->url}}</td>
					 
						<td style="width: 270px;">

						 
							

							@can('menu-links-update')
							<a href="{{route('admin.menu-links.edit',$link)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> تحكم
								</span>
							</a>
							@endcan

							@can('menu-links-delete')
							<form method="POST" action="{{route('admin.menu-links.destroy',$link)}}" class="d-inline-block">@csrf @method("DELETE")
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
			{{$menuLinks->appends(request()->query())->render()}}
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
	fallbackTolerance: 3, // So that we permission select items on mobile
	animation: 150,
	onEnd: function(/**Event*/evt) {
		
		var new_order=[];
		var order_classes = document.getElementsByClassName('ui-state-default drag-handler');
		for (var i = 0; i < order_classes.length; i++) {
			new_order[i]=$(order_classes[i]).attr('data-linkid'); 
		}
		$.ajax({
			method:"POST",
			url:"{{route('admin.menu-links.order')}}",
			data:{order:new_order,_token:'{{csrf_token()}}'}
		}); 
		
	}
});
</script>
@endsection