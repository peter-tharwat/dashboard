@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-pages"></span> الصفحة
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
			 
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;min-height: 80dvh;">
				<div class="col-12 p-0 row">
					<div class="col-3 p-1 builder-aside" >
						<div style="border: 2px solid #f1f1f1;min-height:80dvh;" class="p-2 col-12">
							<div class="col-12 p-0 row " id="items">
								<div class="col-12 p-0 component" data-id="1" style="cursor: pointer;">
									<div style="background: red;height: 50px;">
										نص وصورة
									</div>
								</div>
								<div class="col-12 p-0 component" data-id="2" style="cursor: pointer;">
									<div style="background: green;height: 50px;">
										نص فقط
									</div>
								</div>
								<div class="col-12 p-0 component" data-id="3" style="cursor: pointer;">
									<div style="background: black;height: 50px;"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-9 p-1" >
						<div style="border: 2px solid #f1f1f1;min-height:80dvh;" class="p-2 col-12">
							<div class="col-12 p-2 " id="response-contaienr">
								
							</div>
						</div>
					</div>
				</div>
				
		 
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
@php
$components =[
	1=>[
	'data'=>[

	],
	'html'=>"
		<div class='container py-14 py-md-16 text-center'>
	    <div class='row'>
	      <div class='col-md-9 col-lg-7 col-xl-7 mx-auto text-center'>
	        <img src='/assets/img/avatars/team1.jpg' class='svg-inject icon-svg icon-svg-md mb-4' alt=' style='border-radius:50%;width: 120px;height: 120px;'>
	        <h2 class='display-4 mb-3 text-center'>تحتاج المزيد من المكونات</h2>
	        <p class='lead fs-lg mb-6 px-xl-10 px-xxl-15 text-center'>يمكنك استخدام الثيم التالي للحصول على المزيد من المكونات الجاهزة لخدمة مشروعك.</p>
	        <a href='https://sandbox.elemisthemes.com/' class='btn btn-primary rounded'>عرض الثيم</a>
	      </div> 
	    </div> 
	  </div>
	"
	],
	2=>"

	",
	3=>"

	"
];
@endphp
<script type="module">
	var components={!!json_encode($components)!!};
	$(document).on('click','.builder-aside .component',function(){
		console.log(components);
		$('#response-contaienr').append(components[$(this).data('id')]['html']);
	});
	
</script>
{{-- <script type="module">
	var sortable = Sortable.create(document.getElementById('items'));
	var sortable = Sortable.create(document.getElementById('view'));
</script> --}}
@endsection