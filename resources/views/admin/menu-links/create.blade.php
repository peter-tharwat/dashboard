@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.menu-links.store')}}">
            @csrf
            <input type="hidden" name="menu_id" value="{{request()->get('menu_id')}}">
            <div class="col-12 col-lg-8 p-0 card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span>{{ __('lang.add_new') }}
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
              


                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.type') }}
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control select2-select" name="type" id="type">
                                <option value="CUSTOM_LINK" @if(old('type')=="CUSTOM_LINK") selected @endif>{{ __('lang.custom_link') }}</option>
                                <option value="PAGE" @if(old('type')=="PAGE") selected @endif>{{ __('lang.page') }}</option>
                                <option value="CATEGORY" @if(old('type')=="CATEGORY") selected @endif>{{ __('lang.section') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.value') }}
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control select2-select" name="type_id" id="type_id">
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.title') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title" required maxlength="190" class="form-control" value="{{old('title')}}" id="title">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.link') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="url" name="url" required class="form-control" value="{{old('url')}}" id="url">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.icon') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="icon" class="form-control" value="{{old('icon')}}">
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
@section('scripts')
<script type="module">
$('#type').change(function() {
    var type = $('#type').val();
    $.ajax({
        method: "POST",
        url: "{{route('admin.menu-links.get-type')}}",
        data: { type: type, _token: "<?php echo csrf_token(); ?>" }
    }).done(function(response) {
        $('#type_id').empty();
        $('#type_id').append($("<option></option>").attr({ "value": '', 'selected': '' }).text('اختر من القائمة'));
        console.log(response);
        for (var i = 0; i < response.length; i++){
            $('#type_id').append($("<option></option>").attr("value", response[i].id).attr("data-title", response[i].title).attr("data-url", response[i].url).text(response[i].title));
        }
    });
});
$('#type_id').on('change',function(){
    $('#url').val($('option:selected', this).attr('data-url'));
    $('#title').val($('option:selected', this).attr('data-title'));
});
</script>
@endsection