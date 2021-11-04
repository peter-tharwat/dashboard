@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-users font-5" style="color: #fff"></span>
				</div>
			</div>
			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">المستخدمين</h6>
				<h6 class="font-3">1200</h6>
			</div>
		</div>
	</div>

	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fab fa-youtube font-5" style="color: #fff"></span>
				</div>
			</div>
			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">الدورات</h6>
				<h6 class="font-3">18</h6>
			</div>
		</div>
	</div>
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-hands-helping font-5" style="color: #fff"></span>
				</div>
			</div>
			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">الشركاء</h6>
				<h6 class="font-3">4</h6>
			</div>
		</div>
	</div>
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-box-full font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">الكورسات</h6>
				<h6 class="font-3">84</h6>
			</div>
		</div>
	</div>
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-play font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">الفيديوهات</h6>
				<h6 class="font-3">1720</h6>
			</div>
		</div>
	</div>

	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-stars font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">التقييمات</h6>
				<h6 class="font-3">96</h6>
			</div>
		</div>
	</div>
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-sack-dollar font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">مدفوعات</h6>
				<h6 class="font-3">26.280 ريال</h6>
			</div>
		</div>
	</div> 
	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-box-check font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">الطلبات</h6>
				<h6 class="font-3">180</h6>
			</div>
		</div>
	</div>

	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-book font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">مقال</h6>
				<h6 class="font-3">19</h6>
			</div>
		</div>
	</div>

	<div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
		<div class="col-12 px-0 py-2 d-flex " style="background: #fff;">
			<div style="width: 80px;" class="p-2">
				<div class="col-12 px-0 text-center d-flex align-items-center justify-content-center" style="background: #11233b;height: 64px;border-radius: 50%;">
					<span class="fas fa-book font-5" style="color: #fff"></span>
				</div>
			</div>

			<div style="width: calc(100% - 80px)" class="px-2 py-2">
				<h6 class="font-1">أخبار</h6>
				<h6 class="font-3">7</h6>
			</div>
		</div>
	</div>
	<div class="col-12 px-0 row d-flex">
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
	</div>
	 

</div>
@endsection