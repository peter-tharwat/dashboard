@extends('layouts.app',['page_title'=>$page->title,'page_description'=>$page->meta_description])
@section('content')
<div class="col-12 p-0">
	<div class=" p-0 container">
		<div class="col-12 p-2 p-lg-3 row front-content">
			
			<div class="col-12 col-lg-8 p-2 mx-auto">
				<div class="col-12 px-2 pt-5 pb-3">
			    <div class="col-12 p-0 font-4">
			        <span class="start-head"></span> {{$page->title}}
			    </div>
			  {{--   <div class="col-12 p-0 mt-1" style="opacity: .7;">
			        معلومات عنا
			    </div> --}}
			</div>
				{!!$page->description!!}
			</div>
		</div>
	</div>
</div>
@endsection