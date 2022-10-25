@isset($MenuModules)
    @foreach($MenuModules as $menu)
        @if(isset($menu['child']))
            <div class="col-12 px-0" style="cursor: pointer;">
                <div class="col-12 item px-0 d-flex row " >
                    <div class="col-12 d-flex px-0 item-container">
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="far fa-box-open font-2" style="color:#ff9800"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2 item-container-title has-sub-menu">
                            {{$menu['name']}}
                        </div>
                    </div>
                    <div class="col-12 px-0" >
                        <ul class="sub-item font-1" style="list-style:none;">
                            @foreach($menu['child'] as $child)
                                <li><a href="{{$child['action']}}" style="font-size: 16px;">
                                        <span class="{{$child['icon']}} px-2" style="width: 28px;font-size: 15px;"></span>
                                        {{$child['name']}}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <a href="{{$menu['action']}}" class="col-12 px-0">
                <div class="col-12 item-container px-0 d-flex " >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="{{$menu['icon']}} font-2"> </span>
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                        {{$menu['name']}}
                    </div>
                </div>
            </a>
        @endif
    @endforeach
@endisset
