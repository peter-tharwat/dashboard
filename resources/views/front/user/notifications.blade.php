@extends('layouts.user')
@section('user-content')

@if(auth()->check())
    @php
    if(session('seen_notifications')==null)
        session(['seen_notifications'=>0]);
    $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->paginate();
    $unreadNotifications=auth()->user()->unreadNotifications()->count();
    @endphp
@endif



@if(is_countable($notifications) && count($notifications)==0)
<div class="col-12 p-4 mb-3 d-flex align-items-center justify-content-center" style="background: #fff;border-radius: 8px;min-height: 40vh;">
	<div class="col-12 text-center">
		<span class="fal fa-bells mx-2 font-12 " style="opacity:0.3"></span>
		<div class="col-12 text-center py-3">
			لا توجد اشعارات على حسابك حتى الآن
		</div>
	</div>
</div>
@else

 


<div class="col-12 col-lg-12 p-2 mb-0">
	<div class="col-12 p-3  row d-flex " style="background: #fff;border-radius: 8px;">
		<x-notifications :notifications="$notifications" />
	</div>
</div>


<div class="col-12 p-2">
	{{$notifications->links()}}
</div>

@endif
@endsection