@php
$flat_colors = collect([
'#7367f0',
'#be96f3',
'#7cc5ffaa',
'#cfaaff',
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
    <div class="col-12 row p-0 d-flex">
        <div class="col-12 col-lg-4 p-2">            
            <div class="card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        {{ __('lang.fast_procedures') }}
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3 row d-flex">
                    <div class="col-4  d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('home')}}" target="_blank" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <img src="/images/icons/house.png" style="width:30px;height: 30px">
                                {{-- <span class="fal fa-home font-5" ></span> --}}
                                <div class="col-12 p-0 text-center" >
                                    {{ __('lang.website') }}
                                </div>
                            </div>
                        </a>
                    </div>
                    @can('settings-update')
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.settings.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <img src="/images/icons/settings.png" style="width:30px;height: 30px">
                                {{-- <span class="fal fa-wrench font-5" ></span> --}}
                                <div class="col-12 p-0 text-center" >
                                    {{ __('lang.settings') }}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endcan
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.profile.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <img src="/images/icons/man.png" style="width:30px;height: 30px">
                                {{-- <span class="fal fa-user font-5" ></span> --}}
                                <div class="col-12 p-0 text-center" >
                                    {{ __('lang.my_profile') }}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.profile.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                <img src="/images/icons/edit.png" style="width:30px;height: 30px">
                                {{-- <span class="fal fa-user-edit font-5" ></span> --}}
                                <div class="col-12 p-0 text-center" >
                                    {{ __('lang.edit_profile') }}
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.notifications.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                
                                <img src="/images/icons/notification.png" style="width:30px;height: 30px">
                                {{-- <span class="fal fa-bells font-5" ></span> --}}
                                <div class="col-12 p-0 text-center" >
                                    {{ __('lang.notifications') }}
                                </div>
                            </div>
                        </a>
                    </div>
                    @can('announcements-read')
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="{{route('admin.announcements.index')}}" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                
                                <img src="/images/icons/annonce.png" style="width:30px;height: 30px">
                                {{-- <span class="fal fa-bullhorn font-5" ></span> --}}
                                <div class="col-12 p-0 text-center" >
                                    {{ __('lang.announcements') }}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endcan
                    <div class="col-4 d-flex justify-content-center align-items-center mb-3 py-2">
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color:inherit;">
                            <div class="col-12 p-0 text-center">
                                
                                <img src="/images/icons/logout.png" style="width:30px;height: 30px">
                                {{-- <span class="fal fa-sign-out-alt font-5" ></span> --}}
                                <div class="col-12 p-0 text-center" >
                                    {{ __('lang.logout') }}
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>
        @can('admin-analytics-read')


        <div class="col-12 col-lg-4 p-2">
            <div class="card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <div class="col-12 p-0">
                            <div class="col-12 p-0 row">
                                <div class="col-4">
                                    {{ __('lang.visitors_rate') }}
                                    
                                </div>
                                <div class="col-8 d-flex justify-content-end align-items-center">
                                    

                                    <div class="spinner-grow text-primary mx-2" role="status" style="width:15px;height: 15px">
                                      <span class="visually-hidden"></span>
                                    </div>

                                    <span style="font-weight: bold;"><a href="{{route('admin.traffics.logs')}}">{{count($data['current_visitors'])}}</a></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="traffics-chart">
                    </canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
            <div class="card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        {{ __('lang.new_users') }}
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="new-users">
                    </canvas>
                </div>
            </div>
        </div>        <div class="col-12 col-lg-4 p-2">
            <div class="card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        {{ __('lang.top_visited_pages') }}
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3">
                    @foreach($data['top_pages'] as $page)
                    <div class="col-12 px-2 py-1 row">
                        <div class="col-4 p-0">
                            <span style="width: 30px;height: 17px;font-weight: bold;background: #7367f0;color: #fff;" class="badge badge-light d-flex align-items-center justify-content-center">
                                {{$page->count}}
                            </span>
                        </div>
                        <div class="col-8 text-truncate p-0" style="direction:ltr;font-size: 12px;">
                            <a href="{{$page->url}}" target="_blank" style="color:inherit">{{
                                urldecode(str_replace(env('APP_URL'),'',$page->url)) }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
            <div class="card" style="min-height:100%">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        {{ __('lang.top_traffic_sources') }}
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3">

                    @foreach($data['top_domains'] as $main_domain)
             
                    <div class="col-12 px-2 py-1 row">
                        <div class="col-4 p-0">
                            <span style="width: 30px;height: 17px;font-weight: bold;background: #7367f0;color: #fff;" class="badge badge-light d-flex align-items-center justify-content-center">
                                {{$main_domain->domain_count}}
                            </span>
                            
                        </div>
                        <div class="col-8 text-truncate p-0" style="direction:ltr;font-size: 12px;">
                            <a href="//{{$main_domain->main_domain}}" target="_blank" style="color:inherit">
                                <img src="https://icons.duckduckgo.com/ip3/{{$main_domain->main_domain}}.ico" style="width:10px;height: 10px;" class="d-inline-block">
                                {{$main_domain->main_domain}}
                            </a>
                        </div>
                    </div>
                    @endforeach
 
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
            <div class="card" style="min-height:100%">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        {{ __('lang.highest_access_countries') }}
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3 row">

                    @php
                    $top_countries_count = $data['top_countries']->sum('count')+0.01;
                    @endphp


                    @foreach($data['top_countries'] as $country)
             
                    <div class="col-12 px-2 py-1 row">
                        <div class="col-4 p-0">
                            <span style="width: 30px;height: 17px;font-weight: bold;background: #7367f0;color: #fff;" class="badge badge-light d-flex align-items-center justify-content-center">
                                {{$country->count}}
                            </span>
                            
                        </div>
                        <div class="col-8 text-truncate p-0" style="direction:ltr;font-size: 12px;">
                            
                                <span class="fi fi-{{strtolower($country->country_code)}} mx-1" style="font-size:10px"></span>
                                {{$country->country_name}}
                        </div>
                    </div>
                    @endforeach


                   
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
            <div class="card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        {{ __('lang.browsers') }}
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="ChartBrowsers" style="width:100%;max-height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
            <div class="card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        {{ __('lang.operating_systems') }}
                    
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="ChartOperatingSystems" style="width:100%;max-height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 p-2">
            <div class="card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        {{ __('lang.top_devices') }}
                    </div>
                    <div class="col-12 " style="min-height: 1px;background: var(--border-color);"></div>
                </div>
                <div class="col-12 p-3">
                    <canvas id="ChartDevices" style="width:100%;max-height:250px"></canvas>
                </div>
            </div>
        </div>
        @endcan
    </div>
    @section('scripts')
    @can('admin-analytics-read')
    <script src="/js/chartjs.min.js"></script>
    <script type="text/javascript">

        new Chart(document.getElementById('traffics-chart').getContext('2d'), {
            type: 'line',
            data: {     
            labels: [
            @foreach(array_reverse($data['traffics']) as $key => $value)
            "{{$key}}",
            @endforeach
            ],
            datasets: [{
                label: '#'+ "{{ __('lang.visitors_rate') }}",
                    data: [
                    @foreach(array_reverse($data['traffics']) as $key => $value)
                    "{{$value}}",
                    @endforeach
                    ],
                        backgroundColor: "#7367f0",
                        borderColor: '#7367f0',
                        pointStyle: 'rect',
                        lineTension: '.15',
                        tension: 0.1,
                        fill: true,
                        pointStyle:"circle",
                        pointBorderColor:"#7367f0",
                        pointBackgroundColor:"#fff",
                        pointRadius:4,
                        borderWidth: 3.5,
                }]
            },
            options: {
                responsive:true,
                plugins: {
                    legend: {
                        display:false,
                        labels: {
                            font: {
                                size: 14,
                                family:"kufi-arabic"
                            }
                        }
                    }
                },
                scales: {

                    x: {
                    beginAtZero:false,
                    grid: {
                      display: false
                    }
                  },
                  y: { 
                    grid: {
                      display: true,
                      color:"rgb(3,169,244,0.05)"
                    }
                  },

                },
                hover: {
                    mode: 'index'
                },
                legend: {
                    labels: {

                        fontFamily: 'kufi-arabic',
                        defaultFontFamily: 'kufi-arabic',
                    }
                },
                elements: {
                    line: {
                        tension: 1
                    }
                }
            }
        });





        new Chart(document.getElementById('new-users').getContext('2d'), {
            type: 'line',
            data: {     
            labels: [
            @foreach(array_reverse($data['new_users']['days_list']) as $day)
            "{{$day}}",
            @endforeach
            ],
            datasets: [{
                label: '#'+ "{{ __('lang.new_users') }}",
                    data: [
                    @foreach(array_reverse($data['new_users']['counts_list']) as $count)
                    "{{$count}}",
                    @endforeach
                    ],
                        backgroundColor: "#7367f0",
                        borderColor: '#7367f0',
                        pointStyle: 'rect',
                        lineTension: '.15',
                        tension: 0.1,
                        fill: true,
                        pointStyle:"circle",
                        pointBorderColor:"#7367f0",
                        pointBackgroundColor:"#fff",
                        pointRadius:4,
                        borderWidth: 3.5,
                }]
            },
            options: {
                responsive:true,
                plugins: {
                    legend: {
                        display:false,
                        labels: {
                            font: {
                                size: 14,
                                family:"kufi-arabic"
                            }
                        }
                    }
                },
                scales: {

                    x: {
                    beginAtZero:false,
                    grid: {
                      display: false
                    }
                  },
                  y: { 
                    grid: {
                      display: true,
                      color:"rgb(3,169,244,0.05)"
                    }
                  },

                },
                hover: {
                    mode: 'index'
                },
                legend: {
                    labels: {

                        fontFamily: 'kufi-arabic',
                        defaultFontFamily: 'kufi-arabic',
                    }
                },
                elements: {
                    line: {
                        tension: 1
                    }
                }
            }
        });
    const ChartBrowsers = new Chart(document.getElementById('ChartBrowsers'), {
        type: 'doughnut',
        data: {
            labels: [
                @foreach($data['top_browsers'] as $browser)
                "{{$browser->browser}}",
                @endforeach
            ],
            datasets: [{
                label: '#'+ "{{ __('lang.browsers') }}",
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
        type: 'doughnut',
        data: {
            labels: [
                @foreach($data['top_operating_systems'] as $os)
                "{{$os->operating_system}}",
                @endforeach
            ],
            datasets: [{
                label: '#'+ "{{ __('lang.operating_systems') }}",
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
    const ChartDevices = new Chart(document.getElementById('ChartDevices'), {
        type: 'doughnut',
        data: {
            labels: [
                @foreach($data['top_devices'] as $device)
                "{{$device->device}}",
                @endforeach
            ],
            datasets: [{
                label: '#'+ "{{ __('lang.top_devices') }}",
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
