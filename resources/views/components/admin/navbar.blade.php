<div>
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Language -->
                <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="ti ti-language rounded-circle ti-md"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="en"
                                data-text-direction="ltr">
                                <span class="align-middle">English</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="ar"
                                data-text-direction="rtl">
                                <span class="align-middle">Arabic</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <!--/ Language -->

                <!-- Style Switcher -->
                <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="ti ti-md ti-moon"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                <span class="align-middle"><i class="ti ti-sun me-2"></i>{{ __('lang.light') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                <span class="align-middle"><i class="ti ti-moon me-2"></i>{{ __('lang.dark') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                <span class="align-middle"><i
                                        class="ti ti-device-desktop me-2"></i>{{ __('lang.system') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- / Style Switcher-->

                <!-- Notification -->
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        <i class="ti ti-bell ti-md"></i>
                        <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end py-0">
                        <li class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h5 class="text-body mb-0 me-auto">Notification</h5>
                                <a href="javascript:void(0)" class="dropdown-notifications-all text-body"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                        class="ti ti-mail-opened fs-4"></i></a>
                            </div>
                        </li>
                        <li class="dropdown-notifications-list scrollable-container">
                            <ul class="list-group list-group-flush">
                               
                                {{-- <li
                                    class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-label-warning"><i
                                                        class="ti ti-alert-triangle"></i></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">CPU is running high</h6>
                                            <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>
                                            <small class="text-muted">5 days ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </li>
                        <li class="dropdown-menu-footer border-top">
                            <a href="javascript:void(0);"
                                class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                                View all notifications
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <div class="avatar">
                            <img src="{{ auth()->user()->getUserAvatar() }}" alt class="h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="pages-account-settings-account.html">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <img src="{{ auth()->user()->getUserAvatar() }}" alt
                                                class="h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{ auth()->user()->name }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                                <i class="ti ti-user-check me-2 ti-sm"></i>
                                <span class="align-middle">{{ __('lang.my_profile') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                                <i class="ti ti-settings me-2 ti-sm"></i>
                                <span class="align-middle">{{ __('lang.edit_profile') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="document.getElementById('logout-form').submit();">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">{{ __('lang.logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>
    {{-- <div class="col-12 px-0 d-flex justify-content-between top-nav" style="height: 55px;background: var(--background-1);position: fixed;width: 100%;width: calc(100% - 260px);z-index: 99;border-bottom: 1px solid var(--border-color);">
    <div class="col-12 px-0 d-flex justify-content-center align-items-center btn  asideToggle" style="width: 55px;height: 55px;">
        <span class="fal fa-bars font-4"></span>
    </div> 
    <div class="col-12 px-0 d-flex justify-content-end  " style="height: 60px;">




        <div class="btn-group" id="notificationDropdown">

            <div class="col-12 px-0 d-flex justify-content-center align-items-center btn  " style="width: 55px;height: 55px;" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-notifications">
                <span class="fal fa-bell font-3 d-inline-block" style="color: var(--color-2);transform: rotate(15deg)"></span>
                <span style="position: absolute;min-width: 25px;min-height: 25px;
                @if ($unreadNotifications != 0)
                display: inline-block;
                @else
                display: none;
                @endif
                right: 0px;top: 0px;border-radius: 20px;background: #c00;color:#fff;font-size: 14px;" class="text-center" id="dropdown-notifications-icon">{{$unreadNotifications}}</span>

            </div>
            <div class="dropdown-menu py-0 rounded-0 border-0 shadow " style="cursor: auto!important;z-index: 20000;width: 350px;height: 450px;top: -3px!important;">
                <div class="col-12 notifications-container" style="height:406px;overflow: auto;">
                    <x-notifications :notifications="$notifications" />
                </div>
                <div class="col-12 d-flex border-top"> 
                    <a href="{{route('admin.notifications.index')}}" class="d-block py-2 px-3 ">
                        <div class="col-12 align-items-center">
                          <span class="fal fa-bells"></span> 
                          {{ __('lang.show_all_notifications') }}

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 px-0 d-flex justify-content-center align-items-center  dropdown"  style="width: 55px;height: 55px;" >
            <div style="width: 55px;height: 55px;cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                <img src="" style="padding: 10px;border-radius: 50%;width: 55px;height: 55px;">
            </div>
            <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1" style="top: -3px;">
                    <li><a class="dropdown-item font-1" href="/" target="_blank"><span class="fal fa-desktop font-1"></span> {{ __('lang.view_site') }}</a></li>
                    <li><a class="dropdown-item font-1" href=""><span class="fal fa-user font-1"></span> {{ __('lang.my_profile') }}</a></li>

                    <li><a class="dropdown-item font-1" href="{{route('admin.profile.edit')}}"><span class="fal fa-edit font-1"></span>{{ __('lang.edit_profile') }}</a></li> 

                    


                    @can('hub-files-read')
                    <li><a class="dropdown-item font-1" href="{{route('admin.files.index')}}"><span class="fal fa-file font-1"></span> {{ __('lang.files') }}</a></li> 
                    @endcan


                    @can('traffics-read')
                    <li><a class="dropdown-item font-1" href="{{route('admin.traffics.index')}}"><span class="fal fa-traffic-light font-1"></span> {{ __('lang.traffic') }}</a></li> 
                    @endcan

                    @can('error-reports-read')
                    <li><a class="dropdown-item font-1" href="{{route('admin.traffics.error-reports')}}"><span class="fal fa-bug font-1"></span> {{ __('lang.bug_reports') }}</a></li> 
                    @endcan
                    



                    <li><hr style="height: 1px;margin: 10px 0px 5px;"></li>
                    <li><a class="dropdown-item font-1" href="#" ><span class="fal fa-sign-out-alt font-1"></span> 
                        {{ __('lang.logout') }}
                    </a></li>
            </ul>

        </div>

        <div class="dropdown" style="width: 55px;height: 55px;background: #2381c6">
            <span class="d-inline-block fal fa-user"></span> 
        </div>

    </div>
</div> --}}
</div>
