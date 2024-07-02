@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">{{ __('lang.handle_old_tables') }}</div>
</div>
<br>
<form id="validate-form" class="databaseHelper" enctype="multipart/form-data" method="POST" action="{{route('admin.translation_handler.store')}}">
    @csrf
    <div class="row">
        @foreach ($response as $table => $columns)
            @if (count($columns) > 0)
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card card-box h-100">
                    <div class="col-12 p-2">
                        <div class="d-flex justify-content-between">
                            <h5>Table : {{ $table }}</h5>   
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="true" name="{{$table}}[table]">
                              </div> 
                        </div>       
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr style="">
                                <th style="width: 56px;"> {{ __('lang.name') }}</th>
                                <th style="width: 56px;"> {{ __('lang.translatable') }}</th>
                                <th style="width: 56px;"> {{ __('lang.searchable') }}</th>
                                <th style="width: 56px;"> {{ __('lang.column') }}</th>
                                <th style="width: 56px;"> {{ __('lang.type') }}</th>
                                <th style="width: 56px;"> {{ __('lang.value') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($columns as $column)
                            <tr>
                                <td style="width: 56px;">{{$column}}</td>
                                <td style="width: 56px;"> 
                                    <div class="form-check form-switch">
                                      <input class="form-check-input translatableChecker" type="checkbox" id="" name="{{$table}}[{{$column}}][translatable]">
                                    </div>
                                </td>
                                <td style="width: 56px;"> 
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="" name="{{$table}}[{{$column}}][searchable]">
                                    </div>
                                </td>
                                <td style="width: 56px;"> 
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" id="" name="{{$table}}[{{$column}}][column]">
                                    </div>
                                </td>
                                <td style="width: 120px;"> 
                                    <select class="form-control selectColumnType" disabled name="{{$table}}[{{$column}}][column_type]">
                                        @foreach ($database_columns_types as $type)
                                            <option value="{{ $type->type }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width: 120px;"> 
                                    <input class="form-control selectColumnTypeValue" disabled type="text" name="{{$table}}[{{$column}}][column_type_value]">
                                </td>
                                
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
            @endif
        @endforeach
    </div>
    
    <div class="col-12 p-3">
        <button class="btn btn-success" id="submitEvaluation"> {{ __('lang.save') }}</button>
    </div>
</form>
@push('scripts')
<script>
    // Check if translatableChecker is checked
    $('.translatableChecker').change(function() {
        let el = $(this).parent().parent().parent();

        if(this.checked) {
            el.find('.selectColumnType').prop('disabled', false);
            el.find('.selectColumnTypeValue').prop('disabled', false);
        } else {
            el.find('.selectColumnType').prop('disabled', true);
            el.find('.selectColumnTypeValue').prop('disabled', true);
        }
    });
</script>
@endpush
@endsection
