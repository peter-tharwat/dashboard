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
<div class="col-12 row">
	<div class="col-12 col-lg-2">
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
	</div>
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
	<div class="col-12 col-lg-4">
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
<script type="text/javascript"> 
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