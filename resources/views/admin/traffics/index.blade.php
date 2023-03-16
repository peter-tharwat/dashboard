@extends('layouts.admin', ['page_title' => 'الترافيك'])
@section('content')
<div class="col-12 p-3 text-left font-2" style="color: red">
    {{ $traffics->total() }}
</div>
<div class="col-12 px-0 row d-flex pb-2">
    <form method="GET" action="{{route('admin.traffics.index')}}" class="row col-12 px-0">
        <div class="col-6 col-lg-2 pb-1">
            <input type="" name="ip" placeholder="ip" value="{{\Request::get('ip')}}" class="form-control">
        </div>
        <div class="col-6 col-lg-2 pb-1">
            <input type="" name="user_id" placeholder="user_id" value="{{\Request::get('user_id')}}" class="form-control">
        </div>
        <div class="col-6 col-lg-2 pb-1">
            <input type="" name="domain" placeholder="domain" value="{{\Request::get('domain')}}" class="form-control">
        </div>
        <div class="col-6 col-lg-2 pb-1">
            <input type="" name="country_code" placeholder="country_code" value="{{\Request::get('country_code')}}" class="form-control">
        </div>
        <div class="col-6 col-lg-2 pb-1">
            <button class="btn btn-primary">بحث</button>
        </div>
    </form>
</div>
<div class="col-12   row p-4" style="padding: 30px 0px;position: relative;background: #fff;overflow-x: auto;">
    <table id="myTable" class="table table-striped table-bordered col-12 " style="padding: 0px;min-width: 1200px;">
        <thead>
            <tr>
                <th style="font-size: 12px">id</th>
                <th style="font-size: 12px">traffic_landing</th>
                <th style="font-size: 12px">domain</th>
                <th style="font-size: 12px">ip</th>
                <th style="font-size: 12px;max-width: 100px;">device</th>
                <th style="font-size: 12px">code</th>
                <th style="font-size: 12px">country_code</th>
                <th style="font-size: 12px">country_name</th>
                <th style="font-size: 12px">logs</th>
                <th style="font-size: 12px">created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($traffics as $traffic)
            <tr>
                <td style="font-size: 12px;
                              @if($traffic->user_id != null)
                              background: green;
                              @endif
                              ">
                    @if($traffic->user_id!=null)
                    @php
                    $get_user=\App\Models\User::where('id',$traffic->user_id)->first();
                    @endphp
                    <a href="{{route('user.index',$get_user)}}" target="_blank">
                        {{$traffic->id}}
                    </a>
                    @else
                    {{$traffic->id}}
                    @endif
                </td>

                <td style="font-size: 12px">
                <a href="{{$traffic->traffic_landing}}" target="_blank" data-container="body" data-toggle="popover" data-placement="top" data-content="{{$traffic->user_agent}}"  >
                  {{
                    substr(str_replace(env('APP_URL'),'W/',$traffic->traffic_landing), 0, 20)
                    }} 
                </a>
                 </td> 
              <td style="font-size: 12px">
                <a href="{{$traffic->prev_link}}">
                    {{parse_url($traffic->prev_link)['host']}}
                </a>
              </td>


           
                <td style="font-size: 12px">{{$traffic->ip}}</td>
                <td style="font-size: 9px;max-width: 100px;">
                    {{$traffic->device}}
                </td>
                <td style="font-size: 12px">{{$traffic->code}}</td>
                <td style="font-size: 12px">{{$traffic->country_code}}</td>
                <td style="font-size: 12px">{{$traffic->country_name}}</td>
                <td style="font-size: 12px">
                    <a href="{{route('admin.traffics.logs',['rate_limit_id'=>$traffic->id])}}">
                        <span style="width: 30px;height: 30px;background: #2381c6;color:#fff;border-radius: 50%" class="text-center d-inline-block font-3">
                            {{$traffic->details_count}}
                        </span>
                    </a>
                </td>
                <td style="font-size: 12px">
                    <span data-container="body" data-toggle="popover" data-placement="top" data-content="{{$traffic->device}}">{{\Carbon::parse($traffic->created_at)->diffForHumans()}}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-12 pt-3 ">
        {{$traffics->appends(request()->query())->links()}}
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
setTimeout(function() {
    $('[data-toggle="popover"]').popover();
}, 1000);

</script>
@endsection
