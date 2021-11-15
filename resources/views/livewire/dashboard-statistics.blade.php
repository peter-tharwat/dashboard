@php
$flat_colors = collect([
    '#2196f3cc',
    '#ffc107cc',
    '#009688cc',
    '#ff9800cc',
    '#00bcd4cc',
    '#795548cc',
    '#673ab7cc',
    '#ff5722'
]);
@endphp

<div class="col-12 p-0">

<div class="">
{{-- {{dd($data)}} --}}
</div>
    <div class="col-12 my-2 px-2 ">
        <div class="col-12  main-box row">
            <div class="col-12  px-3 py-3 ">
                @php
                $from = Carbon::parse($from);
                $to = Carbon::parse($to);
                @endphp
                إحصائيات  {{$from->diffInDays($to)}} أيام
            </div>
        </div>
     </div>

    <div class="col-12 row p-0">

        <div class="col-12 col-lg-4 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        إجرائات سريعة
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row d-flex">
                    
                    <div class="col-4  d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('home')}}" target="_blank">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-home font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    الموقع
                                </div>
                            </div>
                        </a>
                     </div>
 
                    
                    
                     <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.settings.index')}}">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-wrench font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    الإعدادات
                                </div>
                            </div>
                        </a>
                     </div>
                     <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.profile.index')}}">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-user font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    ملفي
                                </div>
                            </div>
                        </a>
                     </div>
                     <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.profile.index')}}">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-user-edit font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    تعديل ملفي
                                </div>
                            </div>
                        </a>
                     </div> 
                    
                     
                     
                     <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.notifications.index')}}">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-bells font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    الإشعارات
                                </div>
                            </div>
                        </a>
                     </div> 
                    
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-sign-out-alt font-5"></span> 
                                <div class="col-12 p-0 text-center">
                                    خروج
                                </div>
                            </div>
                        </a>
                     </div>
 
                    
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        المستخدمين الجدد 
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3">
                    <div id="main-chart">
                        
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
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
        <div class="col-12 col-lg-2 p-2">
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
        <div class="col-12 col-lg-2 p-2">
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
        
        
        <div class="col-12 col-lg-2 p-2">
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
          name: "المستخدمين الجدد",
          data: [
            @foreach(array_reverse($data['new_users']['counts_list']) as $count )
          "{{$count}}",
          @endforeach
          ]
          
        }
      ],
      xaxis: {
        categories: [
          
          @foreach(array_reverse($data['new_users']['days_list']) as $day )
          "{{$day}}",
          @endforeach
        ]
      }
    }).render();

    //chart.render();

    const ChartBrowsers = new Chart(document.getElementById('ChartBrowsers'), {
        type: 'doughnut',
        data: {
            labels: [
            @foreach($data['top_browsers'] as $browser )
                "{{$browser->browser}}",
            @endforeach
            ],
            datasets: [{
                label: 'المتصفحات',
                data: [
                @foreach($data['top_browsers'] as $browser )
                    "{{$browser->count}}",
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
            @foreach($data['top_operating_systems'] as $os )
                "{{$os->operating_system}}",
            @endforeach
            ],
            datasets: [{
                label: 'أنظمة التشغيل',
                data: [
                @foreach($data['top_operating_systems'] as $os )
                "{{$os->count}}",
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
        type: 'doughnut',
        data: {
            labels: [
            @foreach($data['top_pages'] as $page )
            "{{str_replace(env('APP_URL'),'',$page->url) }}",
            @endforeach
            ],
            datasets: [{
                label: 'الصفحات',
                data: [
                @foreach($data['top_pages'] as $page )
                "{{$page->count}}",
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
            @foreach($data['top_devices'] as $device )
            "{{$device->device}}",
            @endforeach
            ],
            datasets: [{
                label: 'المتصفحات',
                data: [
                 @foreach($data['top_devices'] as $device )
                "{{$device->count}}",
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
</div>
