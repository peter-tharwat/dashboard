@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.roles.store')}}">
            @csrf
            <div class="col-12 col-lg-5 p-0 card">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> {{ __('lang.add_new_role') }}
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
             
                    
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.name') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="name" required maxlength="190" class="form-control" value="{{old('name',$role??"")}}">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.show_as') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="display_name" required maxlength="190" class="form-control" value="{{old('display_name',$role??"")}}">
                            
                        </div>
                    </div>
                    
                    <div class="col-12 p-2">
                        <div class="col-12">
                            {{ __('lang.description') }}
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="description" class="form-control" style="min-height:150px">{{old('description',$role??"")}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2">
                    


                    <table class="table table-hover">
                    <thead>
                        <tr style="">
                            <th> {{ __('lang.table') }}</th>
                            <th style="width: 56px;"> {{ __('lang.add') }}</th>
                            <th style="width: 56px;"> {{ __('lang.show') }}</th>
                            <th style="width: 56px;"> {{ __('lang.edit') }}</th>
                            <th style="width: 56px;"> {{ __('lang.delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $permissions = \Spatie\Permission\Models\Permission::groupBy('table')->get();
                        @endphp
                        @foreach($permissions as $permission)
                        @php
                        $sub_permissions = \Spatie\Permission\Models\Permission::where('table',$permission->table)->get();
                        @endphp
                        <tr>
                            
                         

                            <td>{{$permission->table}}</td>

                            @if($sub_permissions->where('name',$permission->table.'-create')->first())
                            <td style="width: 56px;">
    
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" id="{{$permission->table.'-create'}}" value="{{$permission->table.'-create'}}" @if(isset($role)&&$role->hasPermissionTo($permission->table.'-create')) checked @endif name="permissions[]">
                                </div>
                            </td>
                            @else
                            <td style="width: 56px;">
                            </td>
                            @endif
                            @if($sub_permissions->where('name',$permission->table.'-read')->first())
                            <td style="width: 56px;">
                                 
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" id="{{$permission->table.'-read'}}" value="{{$permission->table.'-read'}}" @if(isset($role)&&$role->hasPermissionTo($permission->table.'-read')) checked @endif name="permissions[]">
                                </div>
                            </td>
                            @else
                            <td style="width: 56px;">
                            </td>
                            @endif
                            @if($sub_permissions->where('name',$permission->table.'-update')->first())
                            <td style="width: 56px;">
                                 
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" id="{{$permission->table.'-update'}}" value="{{$permission->table.'-update'}}" @if(isset($role)&&$role->hasPermissionTo($permission->table.'-update')) checked @endif name="permissions[]">
                                </div>
                            </td>
                            @else
                            <td style="width: 56px;">
                            </td>
                            @endif
                            @if($sub_permissions->where('name',$permission->table.'-delete')->first())
                            <td style="width: 56px;">
                                 
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" id="{{$permission->table.'-delete'}}" value="{{$permission->table.'-delete'}}" @if(isset($role)&&$role->hasPermissionTo($permission->table.'-delete')) checked @endif name="permissions[]">
                                </div>
                            </td>
                            @else
                            <td style="width: 56px;">
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>



                </div>
            </div>
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation"> {{ __('lang.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
