<div class="col-12 p-0">
    @foreach($links as $link)
        @php
        $link = array_merge([
            'visible'=>1,
            'can'=>"profile-read",
            'icon'=>"",
            'text'=>"",
            'url'=>"",
            'color'=>"",
            'notification'=>null,
            'alert_message'=>"هل أنت متأكد؟",
            'method'=>"GET",
            'attribute'=>null,
            'links'=>[]
        ],$link);
        @endphp
        @if($link['visible'] == 1)
            @can($link['can'])
            @if($link['links']==[])
            <a href="{{$link['url']}}" class="col-12 px-0" {!!$link['attribute']!!}>
                <div class="col-12 item-container px-0 d-flex" >
                    <div style="width: 50px" class="px-3 text-center">
                        <span class="{{$link['icon']}} font-2"> </span> 
                    </div>
                    <div style="width: calc(100% - 50px)" class="px-2 item-container-title">
                        {!!$link['text']!!}
                        @if($link['notification'])
                        <span style="background: #d34339;border-radius: 2px;color:var(--background-1)!important;display: inline-block;font-size: 11px;text-align: center;padding: 1px 5px;margin: 0px 8px">{{$link['notification']}}</span>
                        @endif

                    </div> 
                </div>
            </a>
            @else
            <div class="col-12 px-0 aside-conente-container" style="cursor: pointer;">
                <div class="col-12 item px-0 d-flex row " >
                    <div class="col-12 d-flex px-0 item-container">
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="{{$link['icon']}} font-2"> </span> 
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2 item-container-title has-sub-menu">
                            {!!$link['text']!!}
                        </div> 
                    </div>
                    <div class="col-12 px-0" >
                        <ul class="sub-item font-1" style="list-style:none;">
                            @foreach($link['links'] as $internal_link)
                                @if($internal_link['visible']??1)
                                    @can($internal_link['can']??"profile-read")
                                    <li><a href="{{$internal_link['url']??"#"}}" style="font-size: 16px;"><span class="{{$internal_link['icon']??""}} px-2" style="width: 28px;font-size: 15px;"></span> {{$internal_link['text']}}</a></li>
                                    @endcan
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            @endcan
        @endif
    @endforeach
</div>

