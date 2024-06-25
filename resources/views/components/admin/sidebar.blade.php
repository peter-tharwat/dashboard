<div style="width: 260px;background: #ddeaea;min-height: 100vh;position: fixed;z-index: 900" class="aside active">
    <div class="col-12 px-0 d-flex" style="height: 55px">
        <div class="col-12 p-1" style="color: var(--background-1)">
            <div class="col-12 p-0 row">
                <div class="col-3 py-1 px-1">
                     {{-- <span class="fas fa-chart-bar font-4 d-flex justify-content-center align-items-center" style="background: #38b59c;height: 40px;width: 40px;border-radius: 50%;color: var(--background-1);"></span> --}}
                </div>
                <div class="col-9 ">
                    {{-- <span class="d-inline-block px-2 font-3 pt-1">لوحة التحكم</span>  --}}
                    <span style="width: 55px;height: 55px;position: absolute;left: 0px;top: 0px;align-items: center;justify-content: center;cursor: pointer;" class="asideToggle d-flex d-md-none rounded-0" >
                        <span class="fal fa-bars font-4 "></span>
                    </span>
                </div>
            </div>
            <div class="d-none d-md-none justify-content-center align-items-center px-0   asideToggle" style="width: 40px;height: 40px;">
                <span class="fal fa-bars font-4 cursor-pointer"></span>
            </div>
        </div>
    </div>
<div class="col-12 px-0 pb-4 text-center justify-content-center align-items-center ">
    <a href="{{route('admin.profile.edit')}}">

    <img src="{{auth()->user()->getUserAvatar()}}" style="width: 80px;height: 80px;color: var(--background-1);border-radius: 50%" class="d-inline-block">
        </a>
        <div class="col-12 px-0 mt-2 text-center" style="color: #232323;">
            {{ __('lang.hello') }}
            {{auth()->user()->name}}
        </div> 
    </div>
    <div class="col-12 px-0">



        <div class="col-12 px-3 aside-menu" style="height: calc(100vh - 260px);overflow: auto;">

            <a href="{{route('admin.index')}}" class="col-12 px-0" >
                <div class="col-12 item-container px-0 d-flex" >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-home font-2"> </span> 
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                        {{ __('lang.home') }}
                    </div> 
                </div>
            </a>


            @can('roles-read')
            <a href="{{route('admin.roles.index')}}" class="col-12 px-0" >
                <div class="col-12 item-container px-0 d-flex " >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-key font-2"> </span> 
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                        {{ __('lang.permissions') }}
                    </div> 
                </div>
            </a>
            @endcan
            @can('users-read')
            <a href="{{route('admin.users.index')}}" class="col-12 px-0" >
                <div class="col-12 item-container px-0 d-flex " >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="fal fa-users font-2"> </span> 
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                        {{ __('lang.users') }}
                    </div> 
                </div>
            </a>
            @endcan
            

            

            @foreach($plugins as $plugin)
                @if($plugin->get('type')=="main")
                    @can($plugin->get('route').'-read')
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





            <div class="col-12 px-0" style="cursor: pointer;">
                <div class="col-12 item px-0 d-flex row " >
                    <div class="col-12 d-flex px-0 item-container">
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-newspaper font-2"> </span> 
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2 item-container-title has-sub-menu">
                            {{ __('lang.content') }}
                        </div> 
                    </div>
                    <div class="col-12 px-0" >
                        <ul class="sub-item font-1" style="list-style:none;">
                            @can('categories-read')
                            <li><a href="{{route('admin.categories.index')}}" style="font-size: 16px;"><span class="fal fa-tag px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.categories') }}</a></li>
                            @endcan
                            @can('articles-read')
                            <li><a href="{{route('admin.articles.index')}}" style="font-size: 16px;"><span class="fal fa-book px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.articles') }}</a></li>
                            @endcan

                            @can('comments-read')
                            <li><a href="{{route('admin.article-comments.index')}}" style="font-size: 16px;"><span class="fal fa-comments px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.comments') }}
                                @php
                                $article_comments = \App\Models\ArticleComment::where('reviewed',0)->count();
                                @endphp
                                @if($article_comments)
                                <span style="background: #d34339;border-radius: 2px;color:var(--background-1);display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{$article_comments}}</span>
                                
                                @endif

                            </a></li>
                            @endcan

                            @can('announcements-read')
                            <li><a href="{{route('admin.announcements.index')}}" style="font-size: 16px;"><span class="fal fa-bullhorn px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.ads') }}
                            </a></li>
                            @endcan
                            @can('pages-read')
                            <li><a href="{{route('admin.pages.index')}}" style="font-size: 16px;"><span class="fal fa-file-invoice px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.pages') }}
                            </a></li>
                            @endcan

                            @can('menus-read')
                            <li><a href="{{route('admin.menus.index')}}" style="font-size: 16px;"><span class="fal fa-list px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.menu') }}
                            </a></li>
                            @endcan
                            @can('faqs-read')
                            <li><a href="{{route('admin.faqs.index')}}" style="font-size: 16px;"><span class="fal fa-question px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.faq') }} 
                            </a></li>
                            @endcan
                            @can('redirections-read')
                            <li><a href="{{route('admin.redirections.index')}}" style="font-size: 16px;"><span class="fal fa-directions px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.transactions') }}
                            </a></li>
                            @endcan
                            @can('tags-read')
                            <li><a href="{{route('admin.tags.index')}}" style="font-size: 16px;"><span class="fal fa-tags px-2" style="width: 28px;font-size: 15px;"></span> {{ __('lang.tags') }}
                            </a></li>
                            @endcan



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
                    @if($contacts_count)
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

                                @if(count($plugins))
                                <span style="background: #d34339;border-radius: 2px;color:var(--background-1);display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{count($plugins)}}</span>
                                
                                @endif


                            </a></li>
                            @endcan

                       
                            @foreach($plugins as $plugin)
                                @if($plugin->get('type')=="plugin")
                                    @can($plugin->get('route').'-read')
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
   
</div>