<div class="col-12 px-0 d-flex justify-content-between top-nav" style="height: 55px;background: var(--background-1);position: fixed;width: 100%;width: calc(100% - 260px);z-index: 99;border-bottom: 1px solid var(--border-color);">
    <div class="col-12 px-0 d-flex justify-content-center align-items-center btn  asideToggle" style="width: 55px;height: 55px;">
        <span class="fal fa-bars font-4"></span>
    </div> 
    <div class="col-12 px-0 d-flex justify-content-end  " style="height: 60px;">




        <div class="btn-group" id="notificationDropdown">

            <div class="col-12 px-0 d-flex justify-content-center align-items-center btn  " style="width: 55px;height: 55px;" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-notifications">
                <span class="fal fa-bell font-3 d-inline-block" style="color: var(--color-2);transform: rotate(15deg)"></span>
                <span style="position: absolute;min-width: 25px;min-height: 25px;
                @if($unreadNotifications!=0)
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
                <img src="{{auth()->user()->getUserAvatar()}}" style="padding: 10px;border-radius: 50%;width: 55px;height: 55px;">
            </div>
            <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1" style="top: -3px;">
                    <li><a class="dropdown-item font-1" href="/" target="_blank"><span class="fal fa-desktop font-1"></span> {{ __('lang.view_site') }}</a></li>
                    <li><a class="dropdown-item font-1" href="{{route('admin.profile.index')}}"><span class="fal fa-user font-1"></span> {{ __('lang.my_profile') }}</a></li>

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
                    <li><a class="dropdown-item font-1" href="#" onclick="document.getElementById('logout-form').submit();"><span class="fal fa-sign-out-alt font-1"></span> 
                        {{ __('lang.logout') }}
                    </a></li>
            </ul>

        </div>

        <div class="dropdown" style="width: 55px;height: 55px;background: #2381c6">
            <span class="d-inline-block fal fa-user"></span> 
        </div>

    </div>
</div>