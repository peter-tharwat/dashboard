<div class="btn-group d-flex align-items-center justify-content-center">
    <button class="btn border-0 py-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-ellipsis"></i>
        {{-- <i class="fa-sharp fa-solid fa-grip-dots-vertical"></i> --}}</button>
    <ul class="dropdown-menu border-0 shadow">

        @foreach($links as $link)
        @php
        $link = array_merge([
            'visible'=>1,
            'can'=>"",
            'icon'=>"",
            'text'=>"",
            'url'=>"",
            'color'=>"",
            'notification'=>null,
            'alert_message'=>"هل أنت متأكد؟",
            'method'=>"GET",
        ],$link);
        @endphp

        @if($link['visible'] == 1)
            @can($link['can'])
                @if($link['method']=="GET")
                <li><span class="dropdown-item p-0">
                        <a href="{{$link['url']}}" class="btn border-0 px-3 py-2 col-12 btn-sm font-1  d-flex justify-content-between align-items-center" style="color:{{$link['color']==""?"inherit":$link['color']}}!important">
                            <span style="color:{{$link['color']==""?"inherit":$link['color']}}!important">
                                {!!$link['text']!!}
                                @if($link['notification']!==null)
                                <span class="badge bg-danger">{{$link['notification']}}</span>
                                @endif
                            </span>
                            <span class="{{$link['icon']}}" style="width: 20px;text-align:center;color:{{$link['color']==""?"inherit":$link['color']}}!important"></span>
                            
                        </a>
                    </span>
                </li>
                @else
                    <span class="dropdown-item p-0">
                        <form method="POST" action="{{$link['url']}}" class="d-inline-block col-12">@csrf @method($link["method"])
                            <button class="btn border-0 px-3 py-2 col-12 btn-sm font-1 text-start d-flex justify-content-between align-items-center" onclick="var result = confirm('{{$link['alert_message']}}');if(result){}else{event.preventDefault()}" style="color: {{$link['color']==""?"#ff5454":""}}!important;">
                                <span style="color:{{$link['color']==""?"inherit":$link['color']}}!important">{{$link['text']}}</span>
                                <span class="{{$link['icon']}}" style="width: 20px;text-align:center;color:{{$link['color']==""?"inherit":$link['color']}}!important"></span>
                            </button>
                        </form>
                    </span>            
                @endif
            @endcan
        @endif

        @endforeach


    </ul>
</div>

