@extends('layouts.admin', ['page_title' => 'الأخطاء'])
@section('content')
<div class="col-12   row p-4" style="padding: 30px 0px;position: relative;background: #fff;overflow: auto;">
    <table id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;min-width: 1500px;">
        <thead>
            <tr>
                <th style="font-size: 12px">id</th>
                <th style="font-size: 12px">user_id</th>
                <th style="font-size: 12px">title</th>
                <th style="font-size: 12px">code</th>
                <th style="font-size: 12px">url</th>
                <th style="font-size: 12px">ip</th>
                <th style="font-size: 12px">device</th>
                {{-- <th style="font-size: 12px">description</th>
                <th style="font-size: 12px">seen_at</th> --}}
                <th style="font-size: 12px">created_at</th>
                <th style="font-size: 12px">control</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <th style="font-size: 12px">{{$report->id}}</th>
                <th style="font-size: 12px">
                    @if($report->user_id!=null)
                    <a href="{{route('admin.users.index')}}?id={{$report->user_id}}">{{$report->user_id}} - {{$report->user->name}}</a>
                    @endif
                </th>
                <th style="font-size: 12px">{{$report->title}}</th>
                <th style="font-size: 12px">{{$report->code}}</th>
                <th style="font-size: 12px">
                    <a href="{{$report->url}}">{{substr($report->url, 0, 30)}}</a>
                </th>
                <th style="font-size: 12px">{{$report->ip}}</th>
                <th style="font-size: 12px;background: {{strpos($report->user_agent,'bot')==false?'#e6e6e6':'#fff'}}">
                    <span class="fal fa-desktop" data-container="body" data-toggle="popover" data-placement="top" data-content="{{$report->user_agent}}"></span>
                </th>
                {{-- <th style="font-size: 12px">{{$report->description}}</th>
                <th style="font-size: 12px">{{$report->seen_at}} - {{\Carbon::parse($report->seen_at)->diffForHumans()}}</th> --}}
                <th style="font-size: 12px">{{$report->created_at}} - {{\Carbon::parse($report->created_at)->diffForHumans()}}</th>
                <th style="font-size: 12px">
                    <a href="{{route('admin.traffics.error-report',$report)}}">
                        <span class="btn btn-success"><span class="fal fa-search"></span></span>
                    </a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-12 pt-3 ">
        {{$reports->appends(request()->query())->links()}}
    </div>
</div>
@endsection
@section('scripts')
@endsection
