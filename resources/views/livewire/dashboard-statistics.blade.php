@php
$flat_colors = collect([
'#2196f3',
'#2196f3dd',
'#7cc5ffaa',
'#9ed2fb88',
'#0fb8ff66',
'#5aceff44',
'#8eddff22',
'#c5edff00',
'#c5edff00',
'#c5edff00',
'#c5edff00',
]);
@endphp
<div class="col-12 p-0">
    <div class="">
        {{-- {{dd($data)}} --}}
    </div>
    {{-- <div class="col-12 my-2 px-2 ">
        <div class="col-12  main-box row">
            <div class="col-12  px-3 py-3 ">
                @php
                $from = Carbon::parse($from);
                $to = Carbon::parse($to);
                @endphp
                إحصائيات {{$from->diffInDays($to)}} أيام
            </div>
        </div>
    </div> --}}
    <div class="col-12 row p-0 d-flex">
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
                        <a href="{{route('home')}}" target="_blank" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-home font-5"></span>
                                <div class="col-12 p-0 text-center">
                                    الموقع
                                </div>
                            </div>
                        </a>
                    </div>
                    @can('viewAny',\App\Models\Setting::class)
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.settings.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-wrench font-5"></span>
                                <div class="col-12 p-0 text-center">
                                    الإعدادات
                                </div>
                            </div>
                        </a>
                    </div>
                    @endcan
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.profile.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-user font-5"></span>
                                <div class="col-12 p-0 text-center">
                                    ملفي
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.profile.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-user-edit font-5"></span>
                                <div class="col-12 p-0 text-center">
                                    تعديل ملفي
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.notifications.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-bells font-5"></span>
                                <div class="col-12 p-0 text-center">
                                    الإشعارات
                                </div>
                            </div>
                        </a>
                    </div>
                    @can('viewAny',\App\Models\Announcement::class)
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.announcements.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <span class="fal fa-bullhorn font-5"></span>
                                <div class="col-12 p-0 text-center">
                                    الإعلانات
                                </div>
                            </div>
                        </a>
                    </div>
                    @endcan
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color:inherit;">
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
        @can('show-statistics')


        <div class="col-12 col-lg-4 p-2">
            <div class="col-12 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        معدل الزوار
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3">
                    <div id="traffics-chart">
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
        <div class="col-12 col-lg-4 p-2" >
            <div class="col-12 p-0 main-box d-flex align-items-center" style="min-height:100%">
                <div class="col-12 py-3 px-0 " style="height:100%">
                    <div class="col-12 p-0 d-flex justify-content-center align-items-center my-auto">
                        <div style="width: 80px;display: flex;border-radius: 50%!important;max-width: 100%;position: relative;height: 80px;position: relative;color: #1dcbba;font-weight: bold;" class="d-flex justify-content-center align-items-center font-6 my-2">
                        <svg class="circle-chart" viewBox="0 0 33.83098862 33.83098862" xmlns="http://www.w3.org/2000/svg" style="position: absolute;">
                        <circle class="circle-chart__background" stroke="#f1f1f1" stroke-width="1.5" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431"></circle>
                        <circle class="circle-chart__circle" stroke="#1dcbba" stroke-width="2" stroke-dasharray="{{count($data['current_visitors'])/(count($data['current_visitors'])+2 )*100}},100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431"></circle>
                         </svg>
                        <div style="font-size:25px;font-weight:bold" >
                            {{count($data['current_visitors'])}}
                        </div>
                        </div>


                    </div>
                    <div class="col-12 px-3 py-3 font-3 text-center" style="color:#1dcbba;font-weight:bold;">
                        النشطين الآن
                    </div>
                    <div class="col-12 p-3" style="overflow: auto;">
                            <table class="table   table-hover" style="min-width:350px;max-height:150px">
                                <thead>
                                    <tr style="height: 10px">
                                        <th style="font-size:12px">#</th>
                                        <th style="font-size:12px">الرابط</th>
                                        <th style="font-size:12px">الدولة</th>
                                        <th style="font-size:12px">قادم من</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['current_visitors'] as $page)
                                    <tr style="height: 10px">
                                        <td style="font-size:12px" class="text-truncate">{{$page->rate_limit->id}}</td>
                                        <td style="font-size:12px" class="text-truncate">{{$page->rate_limit->traffic_landing}}</td>
                                        <td style="font-size:12px" class="text-truncate">{{$page->rate_limit->country_name}}</td>
                                        <td style="font-size:12px" class="text-truncate">{{

                                            $page->rate_limit->prev_link}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
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
        <div class="col-12 col-lg-4 p-2">
            <div class="col-12 p-0 main-box" style="min-height:100%">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        أعلى مصادر الزيارات
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3">
                    <div id="ChartTopDomains">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
            <div class="col-12 p-0 main-box" style="min-height:100%">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        أعلى الدول وصولاً
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                    @php
                    $top_countries_count = $data['top_countries']->sum('count')+0.01;
                    @endphp
                    @foreach($data['top_countries'] as $country)
                    <div class="col-12 col-lg-6 p-2 font-1 mb-3">
                        <div class="col-12 p-0 mb-2" style="font-size:12px">
                            {{$country->country_name}}
                        </div>
                        <div class="progress" style="height:7px;border-radius:50px">
                            <div class="progress-bar " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{($country->count/($top_countries_count+0.01))*100}}%;background:#2196f3"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
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
        <div class="col-12 col-lg-4 p-2">
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
        <div class="col-12 col-lg-4 p-2">
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
        @endcan
    </div>
    @section('scripts')
    @can('show-statistics')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
    var chart = new ApexCharts(document.querySelector("#traffics-chart"), {
        chart: {
            height: 280,
            type: "area",

        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: "معدل الزوار",
            data: [
                @foreach(array_reverse($data['traffics']) as $key => $value)
                "{{$value}}",
                @endforeach
            ]

        }],
        xaxis: {
            categories: [

                @foreach(array_reverse($data['traffics']) as $key => $value)
                "{{$key}}",
                @endforeach
            ]
        }
    }).render();


    var chart = new ApexCharts(document.querySelector("#main-chart"), {
        chart: {
            height: 280,
            type: "area",

        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: "المستخدمين الجدد",
            data: [
                @foreach(array_reverse($data['new_users']['counts_list']) as $count)
                "{{$count}}",
                @endforeach
            ]

        }],
        xaxis: {
            categories: [

                @foreach(array_reverse($data['new_users']['days_list']) as $day)
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
                @foreach($data['top_browsers'] as $browser)
                "{{$browser->browser}}",
                @endforeach
            ],
            datasets: [{
                label: 'المتصفحات',
                data: [
                    @foreach($data['top_browsers'] as $browser)
                    "{{$browser->count}}",
                    @endforeach
                ],

                backgroundColor: {!!json_encode($flat_colors) !!},
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
                @foreach($data['top_operating_systems'] as $os)
                "{{$os->operating_system}}",
                @endforeach
            ],
            datasets: [{
                label: 'أنظمة التشغيل',
                data: [
                    @foreach($data['top_operating_systems'] as $os)
                    "{{$os->count}}",
                    @endforeach
                ],

                backgroundColor: {!!json_encode($flat_colors) !!},
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
                @foreach($data['top_pages'] as $page)
                "{{str_replace(env('APP_URL'),'',$page->url) }}",
                @endforeach
            ],
            datasets: [{
                label: 'الصفحات',
                data: [
                    @foreach($data['top_pages'] as $page)
                    "{{$page->count}}",
                    @endforeach
                ],

                backgroundColor: {!!json_encode($flat_colors) !!},
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



    var chart = new ApexCharts(document.querySelector("#ChartTopDomains"), {
        chart: {
            height: 280,
            type: "area",

        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: "أعلى مصادر الزيارات",
            data: [
                @foreach($data['top_domains'] as $domain)
                "{{$domain->domain_count}}",
                @endforeach
            ]

        }],
        xaxis: {
            categories: [

                @foreach($data['top_domains'] as $domain)
                "{{$domain->main_domain}}",
                @endforeach
            ]
        }
    }).render();


    /* const ChartTopDomains = new Chart(document.getElementById('ChartTopDomains'), {
        type: 'bar',
        data: {
            labels: [
            @foreach($data['top_domains'] as $domain )
            "{{$domain->main_domain}}",
            @endforeach
            ],
            datasets: [{
                label: 'المواقع',
                data: [
                @foreach($data['top_domains'] as $domain )
                "{{$domain->domain_count}}",
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
*/




    const ChartDevices = new Chart(document.getElementById('ChartDevices'), {
        type: 'pie',
        data: {
            labels: [
                @foreach($data['top_devices'] as $device)
                "{{$device->device}}",
                @endforeach
            ],
            datasets: [{
                label: 'المتصفحات',
                data: [
                    @foreach($data['top_devices'] as $device)
                    "{{$device->count}}",
                    @endforeach
                ],

                backgroundColor: {!!json_encode($flat_colors) !!},
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
    @endcan
    @endsection
</div>
