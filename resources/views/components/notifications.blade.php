@if(isset($notifications))
@foreach($notifications as $notification)
@php
$bg = $notification['read_at']==null ?"var(--border-color)":"#ffffff";
@endphp 
<div class="col-12 mb-1  p-2 noselect notifications-notifications " style="border-bottom: 1px solid var(--bg-main-bg);background:{{$bg}}">
    <div class="col-12 row pl-0 pr-1">
        <div class="text-center" style="max-width: 63px;padding: 4px 9px 4px 9px!important;">
            <div style="display:flex;">
                <div style="width: 45px;background: var(--bg-second-bg);display: inline-block;border-radius: 5%!important;border: 1px solid  var(--bg-main-bg);max-width: 100%;position: relative;height: 45px;overflow: hidden;" class="mx-auto notification-image mt-2">
                    <img 
                    @if(isset($notification['image']) && $notification['image']!=null)
                    src="{{$notification['image']}}"
                    @else
                    src="{{ env('DEFAULT_IMAGE_NOTIFICATION') }}" 
                    @endif
                     style="width: 43px!important;height: 43px!important;" >
                </div>
            </div>
        </div>
        <div class=" px-2 py-1 " style="display: inline-block;width: calc(100% - 63px) ">
            <div>
                <div style=" font-size: 14px ;font-weight: normal; " class="px-0 pt-0 cairo  ">
                    <span style="display: block; word-wrap: break-word" class="naskh-inner naskh font-1">
                       {!!$notification->data['message']!!}
                    </span>
                </div>
                <div style=" display: inline-block;position: relative;font-size: 14px;color: #919191">
                    <div class="col-12  px-0  text-right text-md-right " style="color: #919191;font-size: 13px;padding: 1px 0px">
                        <span class="fal fa-clock ml-1  font-small" aria-hidden="true"></span> 
                        <span class="naskh font-small">{{\Carbon::parse($notification['created_at'])->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@if(count($notifications)==0)
<div class="col-12 justify-content-center text-ceter d-flex my-auto align-items-center" style="color: var(--bg-color-0);height: 100%;">
    <div class="col-12 px-0 text-center"> 
        <span class="fal fa-bell font-4" style="color:var(--bg-color-4);"></span>
        <div class="col-12 px-0 text-center mt-2">
            لا توجد إشعارات حتى الآن
        </div>
    </div>
</div>
@endif
@endif
