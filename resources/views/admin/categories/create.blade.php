@extends('layouts.admin')
@section('content')
<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('lang.dashboard') , 'isactive' => false],
			['url' => route('admin.categories.index') , 'title' =>  __('lang.categories')  , 'isactive' => false],
			['url' => '#' , 'title' =>   __('lang.add_new_category') , 'isactive' => true],
		]">
		</x-bread-crumb>
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.categories.store') }}">
                @csrf
                <input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{ uniqid() }}">
                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> {{ __('lang.add_new_category') }}
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>

                    <div class="col-12 p-3 row">
                        @foreach (config('translatable.locale_names') as $code => $name)
                            <div class="d-flex justify-content-center align-items-center p-0 settings-tab-opener {{ $loop->first ? 'active' : '' }}" data-opentab="{{ $code }}-tab">
                                {{ $name }}
                            </div>
                        @endforeach
                    </div>
                    <br>
                    @foreach (config('translatable.locale_names') as $code => $name)
                        <div class="col-12 row p-0 taber {{ $loop->first ? 'active' : '' }}" id="{{ $code }}-tab">
                            @foreach ($translateFields as $field => $type)
                                @if ($type == 'string')
                                    <div class="col-12 col-lg-12 p-2 relative">
                                        <div class="col-12">
                                            {{ __('lang.' . $field) }}
                                        </div>
                                        <div class="col-12 pt-3">
                                            <input type="text" name="{{ $field . '_' . $code }}" maxlength="190"
                                                class="form-control" value="{{ old($field . '_' . $code) }}">
                                        </div>
                                    </div>
                                @elseif ($type == 'editor')
                                    <div class="col-12  p-2">
                                        <div class="col-12">
                                            {{ __('lang.' . $field) }}
                                        </div>
                                        <div class="col-12 pt-3">
                                            <textarea name="{{ $field . '_' . $code }}" class="editor with-file-explorer">{{ old($field . '_' . $code) }}</textarea>
                                        </div>
                                    </div>
                                @elseif ($type == 'textarea')
                                    <div class="col-12 col-lg-12 p-2">
                                        <div class="col-12">
                                            {{ __('lang.' . $field) }}
                                        </div>
                                        <div class="col-12 pt-3">
                                            <textarea name="{{ $field . '_' . $code }}" class="form-control" style="min-height:150px">{{ old($field . '_' . $code) }}</textarea>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                    <br>
                    <hr>
                    <br>
                    <div class="col-12 p-3 row">
                        @foreach ($columns_fields as $field => $type)
                            @if ($type == 'string')
                                <div class="col-12 col-lg-12 p-2 relative">
                                    <div class="col-12">
                                        {{ __('lang.' . $field) }}
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="text" name="{{ $field }}" required maxlength="190"
                                            class="form-control" value="{{ old($field) }}">
                                    </div>
                                </div>
                            @elseif ($type == 'editor')
                                <div class="col-12  p-2">
                                    <div class="col-12">
                                        {{ __('lang.' . $field) }}
                                    </div>
                                    <div class="col-12 pt-3">
                                        <textarea name="{{ $field }}" class="editor with-file-explorer">{{ old($field) }}</textarea>
                                    </div>
                                </div>
                            @elseif ($type == 'textarea')
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        {{ __('lang.' . $field) }}
                                    </div>
                                    <div class="col-12 pt-3">
                                        <textarea name="{{ $field }}" class="form-control" style="min-height:150px">{{ old($field) }}</textarea>
                                    </div>
                                </div>
                            @elseif ($type == 'file')
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        {{ __('lang.' . $field) }}
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="file" {{ in_array($field, config('media_columns.multiple')) }}
                                            name="{{ $field }}"
                                            class="form-control">{{ old($field . '_' . $code) }}</input>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">{{ __('lang.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
