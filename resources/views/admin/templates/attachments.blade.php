@php
$image_extensions=array('png','jpg','gif','jpeg','svg');
$voice_extensions=array('webm');
@endphp
<div class=" px-0 row" style=""> 
@foreach($attachments as $attachment)
@php 
$u_id=uniqid();
@endphp
<a
@if($attachment->visibility=="PRIVATE")
 href="{{env('APP_URL')}}{{$attachment->path.$attachment->name}}" 
@else 
 href="{{env('STORAGE_URL').$attachment->path.$attachment->name}}" 
@endif
 class="d-block  
 col-auto
 me-2
@if(!in_array($attachment->extension,$voice_extensions))
    btn
@endif
 not-pace
@if( in_array($attachment->extension,$image_extensions) && !in_array($attachment->extension,$voice_extensions) )
 thumbnail-nafezly
@endif
group_msg_attach_{{$u_id}}
"
style="color: inherit;background:var(--bg-second-bg);border-radius: 5px;margin-bottom: 5px;border:1px solid rgb(141 141 141 / 12%);max-width: 100%;padding: 5px;"
rel='group_msg_attach_{{$u_id}}' 
@if(in_array($attachment->extension,$image_extensions) || in_array($attachment->extension,$voice_extensions) )
target="_blank"
download="{{$attachment->original_name}}"
    {{-- onclick="event.preventDefault();"  --}}
@else
    
@endif
  > 
  @if(!in_array($attachment->extension,$voice_extensions))
    <div style="border-top: none;max-height: 35px;overflow: hidden;" >
        
        <span style="border-radius: 50px;padding-top: 3px;line-height: 1.2;opacity: 0.7;" class=" d-inline-block text-center">
            @if( in_array($attachment->extension,$image_extensions))
            <span class="fal fa-image p-1 font-2"></span>
            @else
            <span class="fal fa-paperclip p-1 font-2"></span>
            @endif
            </span>
        <span style="direction: ltr;position: relative;top: -2px" class="d-inline-block   naskh font-small">
            {{ substr($attachment->original_name,0)}}
        </span>
        <span class="d-inline-block font-small naskh"  style="position: relative;top: -2px">
             {{ round($attachment->size/(1024*1024),1)}}M
        </span>
         <span class="d-inline-block font-small naskh"  style="line-height: 1.2;opacity: 0.7;background: rgb(141 141 141 / 12%);border-radius: 6px;">
            <span class="fal fa-cloud-download p-2 font-2"></span>
        </span>

    </div>
  @elseif(in_array($attachment->extension,$voice_extensions)) 
  <div class="col-12  px-0" > 
    <div class="col-12 py-1 px-2" style="display: flex;">
        <audio 
        style="height:34px" 
        @if($attachment->visibility=="PRIVATE") 
         src="{{env('APP_URL')}}{{$attachment->path.$attachment->name}}" 
        @else 
         src="{{env('STORAGE_URL').$attachment->path.$attachment->name}}" 
        @endif

         controls></audio>
    </div> 
  </div>
  <style type="text/css">
      /*.group_msg_attach_{{$u_id}}{
        padding: 0px 5px!important;
      }*/
  </style>
  @endif
</a>
@endforeach
</div>