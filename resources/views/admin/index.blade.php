@extends('layouts.admin')
@section('content')


<div class="col-12 py-2 px-3 row">
	
	{{-- <div class="col-12 px-0 row d-flex">
		<div class="col-12 col-lg-5 d-flex row" style="background: #fff">
			<div class="col-4 py-4 text-center">
				<span class="fab fa-youtube font-10" style="color: #f44336;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					الدورات التعليمية
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>
			<div class="col-4 py-4 text-center">
				<span class="fad fa-hands-helping font-10" style="color: #11233b;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					شركاء النجاح
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>
			<div class="col-4 py-4 text-center">
				<span class="fad fa-box-full font-10" style="color: #03a9f4;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					الكورسات
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>
			<div class="col-4 py-4 text-center">
				<span class="fad fa-play font-10" style="color: #4caf50;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					الفيديوهات
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>
			<div class="col-4 py-4 text-center">
				<span class="fad fa-book font-10" style="color: #795548;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					المقالات
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>

			<div class="col-4 py-4 text-center">
				<span class="fad fa-newspaper font-10" style="color: #795548;height: 65px"></span>
				<div class="col-12 text-center font-2 mt-2">
					الأخبار
				</div>
				<div class="col-12 text-center py-3">
					<a href="#">
						<button class="btn pb-2 px-4 pt-1" style="border-radius: 50px;background: #03a9f4;color:#fff">إضافة</button>
					</a>
				</div>
			</div>

		</div>
	</div> --}}
	@include('admin.dashboard.index')
	 

</div>
@endsection