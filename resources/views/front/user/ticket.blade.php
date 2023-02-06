@extends('layouts.user')
@section('user-content')
<form action="{{route('user.reply-ticket',$ticket)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
    <div class="col-12 d-flex row m-0 p-3 rounded-2" style="min-height:600px;background: #fff;">
        <div class="col-12 p-0   m-0" style="min-height:600px">
            <div class="col-12  p-3  rounded-2 mb-2 d-flex " style="background:#f7f7f7">
                <div style="width:70px;" class="p-0 d-flex mt-2 ">
                    <img src="{{$ticket->user->getUserAvatar()}}" style="width:55px;height: 55px;border-radius: 50px;">
                </div>
                <div style="width:calc(100% - 70px);" class="p-0">
                    <span class="font-small">
                        {{$ticket->user->name}} - {{\Carbon::parse($ticket->created_at)->diffForHumans()}}
                    </span>
                    <br>
                    <div class="col-12 col-lg-6 font-1" style="white-space: pre-line;">{{$ticket->message}}</div>
                    @if($ticket->media()->count() !=0)
                
                    <div class="col-12 px-0">
                        <div class="col-12 px-0 mt-2">
                            @include('admin.templates.attachments',['attachments'=>$ticket->media])
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @foreach($ticket->replies as $message)
            <div class="col-12  p-3  rounded-2 mb-2 d-flex " style="background:{{$message->is_support_reply==1?"#f9fdff":"#f7f7f7"}}">
                <div style="width:70px;" class="p-0 d-flex mt-2 ">
                    <img src="{{$message->user->getUserAvatar()}}" style="width:55px;height: 55px;border-radius: 50px;">
                </div>
                <div style="width:calc(100% - 70px);" class="p-0">
                    <span class="font-small">
                        {{$message->user->name}} - {{\Carbon::parse($message->created_at)->diffForHumans()}}
                    </span>
                    <br>
                    <div class="col-12 col-lg-6 font-1" style="white-space: pre-line;">{{$message->content}}</div>
                    @if($message->media->count() >0)
                    <br>
                    <div class="col-12 pt-3 px-0">
                        <h6>مرفقات</h6>
                        <div class="col-12 px-2 mt-2">
                            @include('admin.templates.attachments',['attachments'=>$message->media])
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12 p-2" style="position:relative;bottom: 0px;">
            <div class="col-12 p-0 d-flex row m-0">
                <div style="width:calc(100% - 70px);" class="p-1">
                    <textarea name="message" class="form-control" placeholder="اكتب رسالتك هنا" minlength="10" required style="min-height:20px"></textarea>
                </div>
                <div style="width:70px;height: 70px;" class="d-flex p-1">
                    <button class="btn btn-warning d-flex align-items-center justify-content-center rounded-pill p-0 " style="height: 100%;width: 100%;"><span class="fas fa-paper-plane font-4"></span></button></div>
                </div>
            </div>
            <div class="footer-form">
                
            </div>
                <div class="l-btn">
            </div>
            <div class="col-12 p-0 row" id="attached-files-preview">
            </div>
            <div class="col-12 p-0" id="show-uploaded"></div>
        </div>
    </div>
</form>
@endsection
