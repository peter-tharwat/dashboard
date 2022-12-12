@extends('layouts.admin')
@section('content')
<div class="container d-flex justify-content-end pt-4">
	@if(request()->get('user_id')!=null)
	@can('notifications-create')
	<a href="{{route('admin.notifications.create',['user_id'=>request()->get('user_id')])}}">
		<span class="btn btn-primary"><span class="fas fa-bells"></span> إرسال تنبيه</span>
	</a>
	@endcan
	@endif
</div>
<div class="col-12 container">
	<div class="col-12 p-3 notifications-container" >
		<x-notifications :notifications="$notifications" />
	</div>
	<div class="col-12 p-3">
		{{$notifications->links()}}
	</div>
</div>
@endsection