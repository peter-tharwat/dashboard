@php
$image_extensions=array('png','jpg','gif','jpeg','svg');
$voice_extensions=array('webm');
@endphp
<div class="col-12 px-0"> 
@foreach($attachments as $attachment)
@php 
$u_id=uniqid();
@endphp
<a
@if($attachment->visibility=="PRIVATE")
 href="{{env('APP_URL')}}{{$attachment->path.$attachment->name}}" 
@else 
 href="{{env('STORAGE_PATH').$attachment->path.$attachment->name}}" 
@endif
 class="d-block 
@if(!in_array($attachment->extension,$voice_extensions))
    hover-light
@endif
 not-pace
@if( in_array($attachment->extension,$image_extensions) && !in_array($attachment->extension,$voice_extensions) )
 thumbnail-nafezly
@endif
group_msg_attach_{{$u_id}}
"
style="padding: 4px;margin-bottom: 4px"
rel='group_msg_attach_{{$u_id}}' 
@if(in_array($attachment->extension,$image_extensions) || in_array($attachment->extension,$voice_extensions) )
    onclick="event.preventDefault();" 
@else
    download
@endif
  > 
  @if(!in_array($attachment->extension,$voice_extensions))
    <div style="border-top: none; " class="px-2 pb-1">
        <span style="color: var(--bg-font-4);border-radius: 50px;padding-top: 3px;line-height: 1.2" class=" d-inline-block text-center">
        	@if( in_array($attachment->extension,$image_extensions))
			<span class="far fa-image p-1"></span>
			@else
			<span class="far fa-paperclip p-1"></span>
			@endif
			</span>
        <span style="direction: ltr;position: relative;top: -2px" class="d-inline-block   naskh font-small">
            {{ substr($attachment->name,-20)}}
        </span>
        <span class="d-inline-block font-small naskh"  style="color: var(--bg-font-4);position: relative;top: -2px">
            [ {{ round($attachment->size/(1024*1024),1)}} ميجا ]
        </span>
    </div>
  @elseif(in_array($attachment->extension,$voice_extensions)) 
  <div class="col-12  px-0" > 
    <div class="col-12 py-1 px-2" style="display: flex;">
        <audio 

        @if($attachment->visibility=="PRIVATE") 
         src="{{env('APP_URL')}}{{$attachment->path.$attachment->name}}" 
        @else 
         src="{{env('STORAGE_PATH').$attachment->path.$attachment->name}}" 
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