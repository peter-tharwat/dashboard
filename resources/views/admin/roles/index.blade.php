@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<h4 class="py-3 mb-4">{{ __('lang.roles') }}</h4>
		<div class="d-flex justify-content-between">
			<div>
				@can('roles-create')
				<a href="{{route('admin.roles.create')}}">
				<span class="btn btn-primary"><span class="fas fa-plus"></span> {{ __('lang.add_new') }}</span>
				</a>
				@endcan
			</div>
			<form method="GET">
				<input type="text" name="q" class="form-control" placeholder="{{ __('lang.search') }}" value="{{request()->get('q')}}">
			</form>
		</div>
		<br>
		<div>
			<div class="card">
				<div class="table-responsive text-nowrap">
					<table class="table table-bordered table-hover">
						<thead>
							<tr class="fw-bold">
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
							 
								<td style="width: 350px;">
		
							 
									@can('roles-read')
									<a href="{{route('admin.roles.show',$role)}}">
										<span class="btn btn-primary btn-sm mx-1">
											<span class="fas fa-search mx-1"></span> {{ __('lang.show') }}
										</span>
									</a>
									@endcan
									@can('roles-update')
									<a href="{{route('admin.roles.edit',$role)}}">
										<span class="btn btn-primary btn-sm font-1 mx-1">
											<span class="fas fa-wrench mx-1"></span> {{ __('lang.edit') }}
										</span>
									</a>
									@endcan
									@can('roles-delete')
									<form method="POST" action="{{route('admin.roles.destroy',$role)}}" class="d-inline-block">@csrf @method("DELETE")
										<button class="btn  btn-danger btn-sm font-1 mx-1" onclick="var result = confirm('{{ __('lang.are_you_sure_for_delete') }} ؟');if(result){}else{event.preventDefault()}">
											<span class="fas fa-trash mx-1"></span> {{ __('lang.delete') }}
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
			<br>
			{{$roles->appends(request()->query())->render()}}

		</div>
</div>
@endsection