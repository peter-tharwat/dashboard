<div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">
                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                            fill="#7367F0" />
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                        <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                            fill="#7367F0" />
                    </svg>
                </span>
                <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">


            <li class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div>{{ __('lang.home') }}</div>
                </a>
            </li>
            @if (auth()->user()->can('roles-read') || auth()->user()->can('users-read'))
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-users"></i>
                  <div>{{ __('lang.users') }}</div>
                </a>
                <ul class="menu-sub">
                    @can('roles-read')
                  <li class="menu-item">
                    <a href="{{route('admin.roles.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-key"></i>
                      <div> {{ __('lang.permissions') }}</div>
                    </a>
                  </li>
                  @endcan
                  @can('roles-read')
                  <li class="menu-item">
                    <a href="{{route('admin.users.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                      <div>{{ __('lang.users') }}</div>
                    </a>
                  </li>
                  @endcan
                </ul>
              </li>
            @endif

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-writing"></i>
                  <div>{{ __('lang.content') }}</div>
                </a>
                <ul class="menu-sub">
                    @can('categories-read')
                    <li class="menu-item">
                    <a href="{{route('admin.categories.index')}}" class="menu-link">
                      <div> {{ __('lang.categories') }}</div>
                    </a>
                  </li>
                  @endcan
                  @can('articles-read')
                  <li class="menu-item">
                    <a href="{{route('admin.articles.index')}}" class="menu-link">
                      <div>{{ __('lang.articles') }}</div>
                    </a>
                  </li>
                  @endcan
                  @can('comments-read')
                  <li class="menu-item">
                    <a href="{{route('admin.article-comments.index')}}" class="menu-link">
                      <div>{{ __('lang.comments') }}</div>
                    </a>
                  </li>
                  @endcan
                  @can('articles-read')
                  <li class="menu-item">
                    <a href="{{route('admin.articles.index')}}" class="menu-link">
                      <div>{{ __('lang.articles') }}</div>
                    </a>
                  </li>
                  @endcan
                 
                </ul>
              </li>
              @can('announcements-read')
            <li class="menu-item {{ request()->routeIs('admin.announcements.index') ? 'active' : '' }}">
                <a href="{{route('admin.announcements.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div>
                        {{ __('lang.ads') }}
                    </div>
                </a>
            </li>
            @endcan
            @can('pages-read')
            <li class="menu-item {{ request()->routeIs('admin.pages.index') ? 'active' : '' }}">
                <a href="{{route('admin.pages.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-notebook"></i>
                    <div>
                        {{ __('lang.pages') }}
                    </div>
                </a>
            </li>
            @endcan
            @can('menus-read')
            <li class="menu-item {{ request()->routeIs('admin.menus.index') ? 'active' : '' }}">
                <a href="{{route('admin.menus.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-menu-2"></i>
                    <div>
                        {{ __('lang.menus') }}
                    </div>
                </a>
            </li>
            @endcan
            @can('faqs-read')
            <li class="menu-item {{ request()->routeIs('admin.faqs.index') ? 'active' : '' }}">
                <a href="{{route('admin.faqs.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-question-mark"></i>
                    <div>
                        {{ __('lang.faqs') }}
                    </div>
                </a>
            </li>
            @endcan
            @can('redirections-read')
            <li class="menu-item {{ request()->routeIs('admin.redirections.index') ? 'active' : '' }}">
                <a href="{{route('admin.redirections.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-directions"></i>
                    <div>
                        {{ __('lang.redirections') }}
                    </div>
                </a>
            </li>
            @endcan
            @can('tags-read')
            <li class="menu-item {{ request()->routeIs('admin.tags.index') ? 'active' : '' }}">
                <a href="{{route('admin.tags.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-tag"></i>
                    <div>
                        {{ __('lang.tags') }}
                    </div>
                </a>
            </li>
            @endcan
        </ul>
    </aside>

    {{--
    
                
    
    
                
    
                
    
                @foreach ($plugins as $plugin)
                    @if ($plugin->get('type') == 'main')
                        @can($plugin->get('route') . '-read')
                            <a href="{{route('admin.'.$plugin->get('route').'.index')}}" class="col-12 px-0" >
                                <div class="col-12 item-container px-0 d-flex " >
                                    <div style="width: 50px" class="px-3 text-center">
                                        <span class="{{$plugin->get('icon')}} font-2"> </span> 
                                    </div>
                                    <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                                        {{$plugin->get('title')}}
                                    </div> 
                                </div>
                            </a>
                        @endcan
                    @endif
                @endforeach
    
    
    
    
                            </ul>
                        </div>
                    </div>
                </div>
    
    
                
                @can('contacts-read')
                <a href="{{route('admin.contacts.index')}}" class="col-12 px-0" >
                    <div class="col-12 item-container px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-phone font-2"> </span> 
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                            {{ __('lang.contact_requests') }}
                            @php
                        $contacts_count = \App\Models\Contact::where('status','PENDING')->count();
                        @endphp
                        @if ($contacts_count)
                        <span style="background: #d34339;border-radius: 2px;color:var(--background-1);display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{$contacts_count}}</span>
                        
                        @endif
                        </div> 
                    </div>
                </a>
                @endcan
               
                
                
                @can('settings-update')
                <a href="{{route('admin.settings.index')}}" class="col-12 px-0" >
                    <div class="col-12 item-container px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-wrench font-2"> </span> 
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                            {{ __('lang.settings') }}
                        </div> 
                    </div>
                </a> 
                @endcan
    
    
    
    
                @can('plugins-read')
                <div class="col-12 px-0" style="cursor: pointer;">
                    <div class="col-12 item px-0 d-flex row " >
                        <div class="col-12 d-flex px-0 item-container">
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="far fa-box-open font-2" style="color:#ff9800"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2 item-container-title has-sub-menu">
                                {{ __('lang.plugins') }}
    
                            </div> 
                        </div>
                        <div class="col-12 px-0" >
                            <ul class="sub-item font-1" style="list-style:none;">
                                
                                @can('plugins-read')
                                <li><a href="{{route('admin.plugins.index')}}" style="font-size: 16px;"><span class="fal fa-box-open px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.all_plugins') }}
    
                                    @if (count($plugins))
                                    <span style="background: #d34339;border-radius: 2px;color:var(--background-1);display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{count($plugins)}}</span>
                                    
                                    @endif
    
    
                                </a></li>
                                @endcan
    
                           
                                @foreach ($plugins as $plugin)
                                    @if ($plugin->get('type') == 'plugin')
                                        @can($plugin->get('route') . '-read')
                                        <li><a href="{{route('admin.teams.index')}}" style="font-size: 16px;"><span class="{{$plugin->get('icon')}} px-2" style="width: 28px;font-size: 15px;"></span> {{$plugin->get('title')}}
                                        </a></li>
                                        @endcan
                                    @endif
                                @endforeach
    
    
                            </ul>
                        </div>
                    </div>
                </div> 
                @endcan
    
                
                
    
                
    
                <a href="#" class="col-12 px-0" onclick="document.getElementById('logout-form').submit();">
                    <div class="col-12 item-container px-0 d-flex " >
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-sign-out-alt font-2"> </span> 
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                            {{ __('lang.logout') }}
                        </div> 
                    </div>
                </a>
            </div>
        </div>
       
    </div> --}}
</div>
