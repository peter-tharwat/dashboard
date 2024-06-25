@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.translation_handler.store')}}">
            @csrf
            <div class="row">
                @foreach ($response as $table => $columns)
                    @if (count($columns) > 0)
                    <div class="col-lg-4 col-md-6">
                        <div class="main-box mb-4">
                            <div class="col-12 p-2">
                                <div class="d-flex justify-content-between">
                                    <h5> {{ $table }}</h5>   
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="true" name="{{$table}}[table]">
                                      </div> 
                                </div>       
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr style="">
                                        <th style="width: 56px;"> {{ __('lang.name') }}</th>
                                        <th style="width: 56px;"> {{ __('lang.translatble') }}</th>
                                        <th style="width: 56px;"> {{ __('lang.type') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($columns as $column)
                                    <tr>
                                        <td style="width: 56px;">{{$column}}</td>
                                        <td style="width: 56px;"> 
                                            <div class="form-check form-switch">
                                              <input class="form-check-input" type="checkbox" id="" name="{{$table}}[{{$column}}][translatble]">
                                            </div>
                                        </td>
                                        
                                        <td style="width: 56px;"> 
                                            <select name="{{$table}}[{{$column}}][type]" class="form-control">
                                                <option value="string">string</option>
                                                <option value="editor">editor</option>
                                                <option value="textarea">textarea</option>
                                                <option value="file">file</option>
                                                <option value="no">not</option>
                                                <option value="bool">bool</option>
                                            </select>
                                        </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation"> {{ __('lang.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
