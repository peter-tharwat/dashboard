@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.notifications.store')}}">
            @csrf
            <input type="hidden" name="user_id" value="{{request()->get('user_id')}}">
            <div class="col-12 col-lg-4 p-0 card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> {{ __('lang.send_notification') }}
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
             
                    <div class="col-12 col-lg-12 p-2">
                        <div class="col-12">
                            {{ __('lang.content') }}
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="content" class="form-control" style="min-height:150px" required>{{old('content',$notification??"")}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 p-2">
                        <div class="col-12">
                            {{ __('lang.attachments') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="file" name="files[]" multiple class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">{{ __('lang.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
