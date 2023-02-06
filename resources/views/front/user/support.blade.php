@extends('layouts.user')
@section('user-content')

    

@php
$tickets =\App\Models\Contact::where('user_id',auth()->user()->id)->orderBy('id','DESC')->paginate(12);
@endphp

@if(is_countable($tickets) && count($tickets)==0)
<div class="col-12 p-4 mb-3 d-flex align-items-center justify-content-center" style="background: #fff;border-radius: 8px;min-height: 40vh;">
    <div class="col-12 text-center">
        <span class="fal fa-comments-alt mx-2 font-12 " style="opacity:0.3"></span>
        <div class="col-12 text-center py-3">
            تواصل معنا في أي وقت اذا احتجت أي مساعدة
        </div>
        <div class="col-12 p-2 text-center">
            <a href="{{route('user.create-ticket')}}" class="btn btn-outline-warning rounded-pill font-2 px-8"><span class="fal fa-comments-alt mx-2"></span> تذكرة جديدة</a>
        </div>
    </div>
        
</div>
@else

<div class="col-12 p-2 text-center">
    <a href="{{route('user.create-ticket')}}" class="btn btn-outline-warning rounded-pill font-2 px-8"><span class="fal fa-comments-alt mx-2"></span> تذكرة جديدة</a>
</div>

<div class="col-12 p-0 d-flex row">
@foreach($tickets as $ticket)
<div class="col-12 col-lg-6 p-2 mb-0 ">
<div class="col-12 p-3 h-100 row d-flex align-items-center justify-content-center" style="background: #fff;border-radius: 8px;">
     <div class="col-12 py-2 px-0 row">
        <div class="col-12 col-lg-6 p-0 font-1">
            <span class="fal fa-bars" style="width:18px"></span> <span class="mx-2">{{$ticket->id}}</span>
             
        </div>
         <div class="col-12 col-lg-6 p-0 font-1">
           <span class="fal fa-clock" style="width:18px"></span> <span class="mx-2">{{\Carbon::parse($ticket->created_at)->diffForHumans()}}</span>
        </div>


        <div class="col-12 col-lg-12 p-0 font-1">
            <a href="{{route('user.ticket',$ticket)}}">{{mb_strimwidth(str_replace("\n"," ",$ticket->message), 0, 250,"...")}}</a>
        </div>
       
      
        
    </div>
    
</div>
</div>

@endforeach

<div class="col-12 p-2">
    {{$tickets->links()}}
</div>


</div>




@endif


@endsection
