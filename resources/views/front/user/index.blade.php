@extends('layouts.user')
@section('user-content')
<div class="col-12 p-4 mb-3 d-flex align-items-center justify-content-center" style="background: #fff;border-radius: 8px;min-height: 40vh;">
	<div class="col-12 text-center">
		<span class="fal fa-info-circle mx-2 font-12 " style="opacity:0.3"></span>
		<div class="col-12 text-center py-3">
			لا توجد معلومات في حسابك
		</div>
		<div class="col-12 p-2 text-center">
			<a href="/" class="btn btn-outline-warning rounded-pill font-2 px-8"><span class="fal fa-home "></span> <span class="mx-2">عرض الرئيسية</span> </a>
		</div>
	</div>
		
</div>
@endsection