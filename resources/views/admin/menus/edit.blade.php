@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.menus.update',$menu)}}">
            @csrf
            @method("PUT")
            <div class="col-12 col-lg-8 p-0 card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span>{{ __('lang.edit_menu') }}
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.title') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title" required maxlength="190" class="form-control" value="{{$menu->title}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.postion') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="location" required maxlength="190" class="form-control" value="{{$menu->location}}">
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
