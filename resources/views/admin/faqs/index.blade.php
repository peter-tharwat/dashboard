@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-faqs"></span> عرض الكل
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('faqs-create')
					<a href="{{route('admin.faqs.create')}}">
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
						<th>السؤال</th>
						<th>مميز</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody id="sortable-table">
					@foreach($faqs as $faq)
					<tr >
						<td class="ui-state-default drag-handler" data-faq="{{$faq->id}}">{{$faq->id}}</td>
						<td>{{$faq->question}}</td>
						<td>
							@if($faq->is_featured==1)
							<span class="fas fa-check-circle text-success" ></span>
							@endif
						</td>
						<td style="width: 270px;">

					 

							@can('faqs-update')
							<a href="{{route('admin.faqs.edit',$faq)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> تحكم
								</span>
							</a>
							@endcan
							@can('faqs-delete')
							<form method="POST" action="{{route('admin.faqs.destroy',$faq)}}" class="d-inline-block">@csrf @method("DELETE")
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
			{{$faqs->appends(request()->query())->render()}}
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
			new_order[i]=$(order_classes[i]).attr('data-faq'); 
		}
		$.ajax({
			method:"POST",
			url:"{{route('admin.faqs.order')}}",
			data:{order:new_order,_token:'{{csrf_token()}}'}
		}); 
		
	}
});
</script>
@endsection