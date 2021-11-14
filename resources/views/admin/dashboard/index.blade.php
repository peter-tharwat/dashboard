@php
$flat_colors = collect([
	'#2196f3aa',
	'#ffc107aa',
	'#009688aa',
	'#ff9800aa',
	'#00bcd4aa',
	'#795548aa',
	'#673ab7aa',
	'#ff5722'
]);
@endphp
{{-- {{dd($data)}} --}}

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
	{{-- <div class="col-6 col-sm-4 col-lg-3 col-xl-2 px-2 mb-3">
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
 --}}

<div class="col-12 row p-0">
	<div class="col-12 col-lg-4">
		<div class="col-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	المتصفحات
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3">
				<div id="main-chart">
					
				</div>
				{{-- <canvas id="ChartBrowsers" style="width:100%;max-height:250px"></canvas> --}}
			</div>
		</div>
	</div>
	{{-- <div class="col-12 col-lg-2">
		<div class="col-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	المتصفحات
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3">
				<canvas id="ChartBrowsers" style="width:100%;max-height:250px"></canvas>
			</div>
		</div>
	</div> --}}
	<div class="col-12 col-lg-2">
		<div class="col-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	انظمة التشغيل
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3">
				<canvas id="ChartOperatingSystems" style="width:100%;max-height:250px"></canvas>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-4">
		<div class="col-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	أعلى الصفحات زيارة
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3">
				<canvas id="ChartTopPages" style="width:100%;max-height:250px"></canvas>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-2">
		<div class="col-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	أعلى الأجهزة
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3">
				<canvas id="ChartDevices" style="width:100%;max-height:250px"></canvas>
			</div>
		</div>
	</div>
</div>
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript"> 
var chart = new ApexCharts(document.querySelector("#main-chart"), {
  chart: {
    height: 280,
    type: "area",

  },
  dataLabels: {
    enabled: false
  },
  series: [
    {
      name: "متصفح",
      data: [
      @foreach($data['agent'] as $item )
	  		{{$item->count+1}},
		@endforeach
      ]
    }
  ],
  xaxis: {
    categories: [
      @foreach($data['agent'] as $item )
		  '{{$item->family}}',
		@endforeach
    ]
  }
}).render();

//chart.render();

const ChartBrowsers = new Chart(document.getElementById('ChartBrowsers'), {
    type: 'doughnut',
    data: {
        labels: [
        @foreach($data['agent'] as $item )
		  '{{$item->family}}',
		@endforeach
        ],
        datasets: [{
            label: 'المتصفحات',
            data: [
            @foreach($data['agent'] as $item )
		  		{{$item->count+1}},
			@endforeach
            ],
            
            backgroundColor:{!!json_encode($flat_colors)!!},
            borderColor: [
                'transparent',
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
const ChartOperatingSystems = new Chart(document.getElementById('ChartOperatingSystems'), {
    type: 'polarArea',
    data: {
        labels: [
        @foreach($data['platform'] as $item )
		  '{{$item->family}}',
		@endforeach
        ],
        datasets: [{
            label: 'المتصفحات',
            data: [
            @foreach($data['platform'] as $item )
		  		{{$item->count+1}},
			@endforeach
            ],
            
            backgroundColor:{!!json_encode($flat_colors)!!},
            borderColor: [
                'transparent',
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
const ChartTopPages = new Chart(document.getElementById('ChartTopPages'), {
    type: 'bar',
    data: {
        labels: [
        @foreach($data['route']->take(10) as $item )
		  '{{$item->path}}',
		@endforeach
        ],
        datasets: [{
            label: 'المتصفحات',
            data: [
            @foreach($data['route']->take(10) as $item )
		  		{{$item->count+1}},
			@endforeach
            ],
            
            backgroundColor:{!!json_encode($flat_colors)!!},
            borderColor: [
                'transparent',
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
const ChartDevices = new Chart(document.getElementById('ChartDevices'), {
    type: 'pie',
    data: {
        labels: [
        @foreach($data['device']->take(10) as $item )
		  '{{$item->family}}',
		@endforeach
        ],
        datasets: [{
            label: 'المتصفحات',
            data: [
            @foreach($data['device']->take(10) as $item )
		  		{{$item->count+1}},
			@endforeach
            ],
            
            backgroundColor:{!!json_encode($flat_colors)!!},
            borderColor: [
                'transparent',
            ],
            borderWidth: 0
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>
@endsection