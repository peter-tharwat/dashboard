@extends('layouts.admin')
@section('content')

    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.categories.update', $category) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{ uniqid() }}">
                <div class="col-12 col-lg-8 p-0 card">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> {{ __('lang.edit_category') }}
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
                                                class="form-control" value="{{ $category->translate($code)->{$field} }}">
                                        </div>
                                    </div>
                                @elseif ($type == 'editor')
                                    <div class="col-12  p-2">
                                        <div class="col-12">
                                            {{ __('lang.' . $field) }}
                                        </div>
                                        <div class="col-12 pt-3">
                                            <textarea name="{{ $field . '_' . $code }}" class="editor with-file-explorer">{{ $category->translate($code)->{$field} }}</textarea>
                                        </div>
                                    </div>
                                @elseif ($type == 'textarea')
                                    <div class="col-12 col-lg-12 p-2">
                                        <div class="col-12">
                                            {{ __('lang.' . $field) }}
                                        </div>
                                        <div class="col-12 pt-3">
                                            <textarea name="{{ $field . '_' . $code }}" class="form-control" style="min-height:150px">{{ $category->translate($code)->{$field} }}</textarea>
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
                                            class="form-control" value="{{ $category->{$field} }}">
                                    </div>
                                </div>
                            @elseif ($type == 'editor')
                                <div class="col-12  p-2">
                                    <div class="col-12">
                                        {{ __('lang.' . $field) }}
                                    </div>
                                    <div class="col-12 pt-3">
                                        <textarea name="{{ $field }}" class="editor with-file-explorer">{{ $category->{$field} }}</textarea>
                                    </div>
                                </div>
                            @elseif ($type == 'textarea')
                                <div class="col-12 col-lg-12 p-2">
                                    <div class="col-12">
                                        {{ __('lang.' . $field) }}
                                    </div>
                                    <div class="col-12 pt-3">
                                        <textarea name="{{ $field }}" class="form-control" style="min-height:150px">{{ $category->{$field} }}</textarea>
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
                                            class="form-control" />
                                    </div>
									@if (in_array($field, config('media_columns.img')))
									<div class="col-12 pt-3">
										<img src="{{ $category->{$field}() }}" style="width:100px">
									</div>
									@endif
									
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="col-12 p-3">
                        <button class="btn btn-success" id="submitEvaluation">{{ __('lang.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
