@extends('layouts.admin')
@section('content')
<div class="col-12 container">
	<div class="col-12 p-3 notifications-container" >
		<x-notifications :notifications="$notifications" />
	</div>
	<div class="col-12 p-3">
		{{$notifications->links()}}
	</div>
</div>
@endsection