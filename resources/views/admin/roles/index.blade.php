@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-roles"></span> {{ __('lang.roles') }}
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('roles-create')
					<a href="{{route('admin.roles.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> {{ __('lang.add_new') }}</span>
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
			<div class="col-12 p-0" style="min-width:1100px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>{{ __('lang.name') }}</th>
						<th>{{ __('lang.control') }}</th>
					</tr>
				</thead>
				<tbody id="sortable-table">
					@foreach($roles as $role)
					<tr >
						<td class="ui-state-default drag-handler" data-role="{{$role->id}}">{{$role->id}}</td>
						<td>{{$role->name}}</td>
					 
						<td style="width: 270px;">

					 
							@can('roles-read')
							<a href="{{route('admin.roles.show',$role)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-search "></span> {{ __('lang.show') }}
								</span>
							</a>
							@endcan
							@can('roles-update')
							<a href="{{route('admin.roles.edit',$role)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> {{ __('lang.edit') }}
								</span>
							</a>
							@endcan
							@can('roles-delete')
							<form method="POST" action="{{route('admin.roles.destroy',$role)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('{{ __('lang.are_you_sure_for_delete') }} ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> {{ __('lang.delete') }}
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
			{{$roles->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection