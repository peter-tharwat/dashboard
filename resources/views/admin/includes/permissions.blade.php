@php
    $rows = (new \App\Units\ModulesUnit())->ShareDataModules('permissions');
@endphp

@foreach($rows as $modules => $row)
    <tr>
        <td>{{$row['table']}}</td>
        @if($sub_permissions->where('name',$row['table'].'-create')->first())
            <td style="width: 56px;">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="{{$row['table'].'-create'}}" value="{{$row['table'].'-create'}}" @if(isset($role)&&$role->hasPermission($row['table'].'-create')) checked @endif name="permissions[]">
                </div>
            </td>
        @else
            <td style="width: 56px;"></td>
        @endif
        @if($sub_permissions->where('name',$row['table'].'-read')->first())
            <td style="width: 56px;">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="{{$row['table'].'-read'}}" value="{{$row['table'].'-read'}}" @if(isset($role)&&$role->hasPermission($row['table'].'-read')) checked @endif name="permissions[]">
                </div>
            </td>
        @else
            <td style="width: 56px;"></td>
        @endif
        @if($sub_permissions->where('name',$row['table'].'-update')->first())
            <td style="width: 56px;">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="{{$row['table'].'-update'}}" value="{{$row['table'].'-update'}}" @if(isset($role)&&$role->hasPermission($row['table'].'-update')) checked @endif name="permissions[]">
                </div>
            </td>
        @else
            <td style="width: 56px;"></td>
        @endif
        @if($sub_permissions->where('name',$row['table'].'-delete')->first())
            <td style="width: 56px;">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="{{$row['table'].'-delete'}}" value="{{$row['table'].'-delete'}}" @if(isset($role)&&$role->hasPermission($row['table'].'-delete')) checked @endif name="permissions[]">
                </div>
            </td>
        @else
            <td style="width: 56px;"></td>
        @endif
    </tr>
@endforeach
