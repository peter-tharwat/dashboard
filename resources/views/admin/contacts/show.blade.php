@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
    <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
        <div class="col-12 px-3">
            <h5>عرض الرسالة رقم {{$contact->id}} القادمة من {{$contact->name}}</h5>
        </div>
        @if($contact->files()->count() !=0)
        <div class="col-12 px-3">
        	<h6>مرفقات</h6>
        	@include('admin.templates.attachments',['attachments'=>$contact->files])
        </div>
        @endif
        <div class="col-12  px-3 py-1 mt-4">

        	<div class="col-12  " style="direction: rtl" id="{{$contact->id}}">
	                <div class="col-12 col-md-10 col-lg-9 col-xl-6 p-2 row rounded-2" style="direction: rtl;background: var(--border-color);">
	                    <div style="width:70px;" class="text-center d-none d-md-flex align-items-start">
	                        <div class="d-inline-block">

	                        	@if($contact->user_id!=null)

	                        	<a href="{{route('admin.users.index',['id'=>$contact->user_id])}}" class="d-inline-block text-center">
	                                <img src="{{$contact->user->getUserAvatar()}}" style="width: 45px;height: 45px;display: inline-block;border-radius: 50%!important;padding: 3px;" class="mx-auto" alt="صورة المستخدم">
	                                <span style="display: inline-block;position: relative;top: 6px; " class="px-2 pt-0  float-end kufi"> </span>
	                            </a>

	                            
	                            @else
	                            

	                        
	                                <img src="https://manager.almadarisp.com/user/img/user.png" style="width: 45px;height: 45px;display: inline-block;border-radius: 50%!important;padding: 3px;" class="mx-auto" alt="صورة المستخدم">
	                                <span style="display: inline-block;position: relative;top: 6px; " class="px-2 pt-0  float-end kufi"> </span>
	                            

	                            @endif
	                        </div>
	                    </div>
	                    <div class=" px-2" style="width: calc(100% - 70px);">
	                        <div class="col-12 rounded py-2" style="background: var(--message-sender-bg);">
	                            <div class="col-12 px-0 row">
	                                	<div class="col-7 px-0">

	                                		@if($contact->user_id!=null)
	                                    <a href="{{route('admin.users.index',['id'=>$contact->user_id])}}" class="d-inline-block text-center">
	                                        
	                                        <span style="font-size:13px;opacity: .7;font-weight: bold;color: var(--bg-color-0)" class="kufi">{{$contact->user->name}}</span>
	                                    </a>

	                                         
	                                         @else

	                             
	                                        
	                                        <span style="font-size:13px;opacity: .7;font-weight: bold;color: var(--bg-color-0)" class="kufi">{{$contact->name }}<br>{{ $contact->email}} <br>{{$contact->phone}}</span>
	                                     

	                                         @endif

	                                         </div>
	                                <div class="col-5 px-0 text-end">
	                                    <span style="font-size:14px;opacity: .7" class="naskh">{{\Carbon::parse($contact->created_at)->diffForHumans()}}</span>
	                                </div>
	                            </div>
	                            <div class="col-12 px-0">
	                                <div style=" position: relative;top: 0px;" class="py-2">
	                                    <span style=" position: relative;color: var(--bg-color-0); font-size: 17px;white-space: pre-line;word-wrap: break-word;overflow: hidden;  " class="p-0 naskh"> {{$contact->message}}</span>
	                                </div>
	                                <div class="col-12 px-1">
	                                    <div class="col-12 px-0">
	                                    </div>
	                                </div>
	                            </div> 
	                        </div>
	                    </div>
	                </div>
	            </div> 
        </div>
        <div class="col-12 p-0">


         
        	@foreach($contact->replies as $reply)
	            <div class="col-12 px-1 px-lg-3 row py-2 message" style="direction: rtl;" id="{{$reply->id}}">
	                <div class="col-12 col-md-10 col-lg-9 col-xl-6 p-2 row rounded-2" style="direction: rtl;background:#d7eeff;">
	                    <div style="width:70px;" class="text-center d-none d-md-flex align-items-start">
	                        <div class="d-inline-block">
	                            <a href="{{route('admin.users.index',['id'=>$reply->user_id])}}" class="d-inline-block text-center">
	                                <img src="{{$reply->user->getUserAvatar()}}" style="width: 45px;height: 45px;display: inline-block;border-radius: 50%!important;padding: 3px;" class="mx-auto" alt="صورة المستخدم">
	                                <span style="display: inline-block;position: relative;top: 6px; " class="px-2 pt-0  float-end kufi"> </span>
	                            </a>
	                        </div>
	                    </div>
	                    <div class=" px-2" style="width: calc(100% - 70px);">
	                        <div class="col-12 rounded py-2" style="background: var(--message-sender-bg);">
	                            <div class="col-12 px-0 row">
	                                <div class="col-7 px-0">
	                                    <a href="{{route('admin.users.index',['id'=>$reply->user_id])}}" class="d-inline-block text-center">
	                                        
	                                        <span style="font-size:13px;opacity: .7;font-weight: bold;color: var(--bg-color-0)" class="kufi">{{$reply->user->name}}</span></a>

	                                         </div>
	                                <div class="col-5 px-0 text-end">
	                                    <span style="font-size:14px;opacity: .7" class="naskh">{{\Carbon::parse($reply->created_at)->diffForHumans()}}</span>
	                                </div>
	                            </div>
	                            <div class="col-12 px-0">
	                                <div style=" position: relative;top: 0px;" class="py-2">
	                                    <span style=" position: relative;color: var(--bg-color-0); font-size: 17px;white-space: pre-line;word-wrap: break-word;overflow: hidden;  " class="p-0 naskh"> {{$reply->content}}</span>
	                                </div>
	                                <div class="col-12 px-1">
	                                    <div class="col-12 px-0">
	                                    </div>
	                                </div>
	                            </div> 
	                        </div>
	                    </div>
	                    @if($reply->files()->count() !=0)
				        <div class="col-12 px-3">
				        	<h6>مرفقات</h6>
				        	@include('admin.templates.attachments',['attachments'=>$reply->files])
				        </div>
				        @endif
	                </div>
	            </div>
            @endforeach


        </div>
        <div class="col-12  px-3 py-1 mt-4">
            <form method="POST" action="{{route('admin.contact-replies.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-10 col-lg-9 col-xl-6 p-0 mb-3">
                    <div class="col-12 px-0 pt-1 mb-3">
                        إرسال رد
                    </div>
                    <div class="col-12 px-0">
                        <input type="hidden" name="contact_id" value="{{$contact->id}}">
                        <textarea name="content" class="form-control" min="3" max="1000" style="min-height: 200px"></textarea>
                        <h6>مرفقات</h6>
                        <input type="file" name="files[]" multiple class="form-control col-12 col-lg-6">
                    </div>
                </div>
                <div class="col-12 p-0">
                    <button class="btn btn-primary">إرسال رد</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
