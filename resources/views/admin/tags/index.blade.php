@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 card">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-tags"></span>  {{ __('lang.tags') }}
				</div>
				<div class="col-12 col-lg-4 p-2">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('tags-create')
					<a href="{{route('admin.tags.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span>  {{ __('lang.add_new') }}</span>
					</a>
					@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="{{ __('lang.search') }}" value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="table-responsive text-nowrap">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>{{ __('lang.name') }}</th>
						<th>{{ __('lang.slug') }}</th>
						<th> {{ __('lang.control') }}</th>
					</tr>
				</thead>
				<tbody id="sortable-table">
					@foreach($tags as $tag)
					<tr >
						<td>{{$tag->id}}</td>
						<td>{{$tag->tag_name}}</td>
						<td>{{$tag->slug}}</td>
					 
						<td style="width: 270px;">
							@can('tags-update')
							<a href="{{route('admin.tags.edit',$tag)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span>  {{ __('lang.control') }}
								</span>
							</a>
							@endcan
							@can('tags-delete')
							<form method="POST" action="{{route('admin.tags.destroy',$tag)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('{{ __('lang.are_you_sure_for_delete') }} ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span>  {{ __('lang.delete') }}
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
			{{$tags->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection