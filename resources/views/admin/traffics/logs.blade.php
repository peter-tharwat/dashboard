@extends('layouts.admin', ['page_title' => 'الترافيك'])
@section('content')
<div class="col-12   row p-4" style="padding: 30px 0px;position: relative;background: #fff">
    <table id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;">
        <thead>
            <tr>
                <th style="font-size: 12px">id</th>
                <th style="font-size: 12px">rate_limit_id</th>
                <th style="font-size: 12px">user_id</th>
                <th style="font-size: 12px">url</th>
                <th style="font-size: 12px">created_at</th>
                <th style="font-size: 12px">from</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>
                    {{$log->id}}
                </td>
                <td>
                    <a href="{{route('admin.traffics.index')}}?id={{$log->rate_limit_id}}" target="_blank">
                        {{$log->rate_limit_id}}
                    </a>
                </td>
                <td>
                    <a href="{{route('admin.users.index')}}?id={{$log->user_id}}" target="_blank">
                        {{$log->user_id}}
                    </a>
                </td>
                <td style="font-size: 12px">
                    <a href="{{$log->url}}" target="_blank">
                        {{
                        substr(str_replace(env('APP_URL'),'W',$log->url), 0, 20)
                        }}
                    </a>
                </td>
                <td>
                    {{$log->created_at}}
                </td>
                <td>
                    {{
                    \Carbon::parse($log->created_at)->diffForHumans()
                    }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-12 pt-3 ">
        {{$logs->appends(request()->query())->links()}}
    </div>
</div>
@endsection
@section('scripts')
@endsection
