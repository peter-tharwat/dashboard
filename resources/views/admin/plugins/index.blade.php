@extends('layouts.admin')
@section('content')
<style type="text/css">
.start-head {
    height: 20px;
    width: 12px;
    display: inline-block;
    background: #7b60fb;
    position: relative;
    top: 5px;
    margin-left: 5px;
}
.textarea-code,.textarea-code:focus,.textarea-code:hover{
    border:1px solid #000!important;background: #202020!important;color:#fff!important;direction:ltr!important;
}
</style>
<div class="col-12 p-3 main-container">
    @php
    @endphp
    <div class="col-12 p-0 row">
        @foreach ($groupedPlugins as $category => $category_plugins)
        <div class="col-12 p-2 mt-4">
            <h4><span class="start-head" style="background: #232323;"></span> {{$category}}</h4>
        </div>
        <div class="col-12 p-0 row">
            @foreach($category_plugins as $plugin)
            <div  class="col-12 col-lg-7 p-3  row d-flex align-items-center rounded" style="background: var(--background-1);margin-bottom: 10px!important;">
                <div class="col p-0 row d-flex align-items-center">
                    <div class="col-auto" style="width:60px">
                        <img src="{{$plugin['image']}}" style="max-height: 40px;max-width: 70%;">
                        {{-- <span class="fa-thin fa-align-left" style="width: 30px;height: 30px;display: flex;align-items: center;justify-content: center;border-radius: 50%;margin: 0px 3px;background: var(--background-0);"></span> --}}
                    </div>
                    <div class="col p-0" style="width: calc(100% - 60px);">
                        <div class="col text-truncate">
                            {{$plugin['title']}}
                        </div>
                        <div class="col text-truncate" style="font-size: 12px;opacity: 0.7;">
                            {{mb_strimwidth($plugin['description'],0,100,'...')}}
                        </div>
                    </div>
                </div>
                <div class="col-auto p-0 py-2">
                    @if(in_array($plugin['slug'],$plugins_array))

               




                    <a class="rounded font-1 btn btn-outline-primary" href="{{route('admin.plugins.show',['plugin'=>$plugins->where('slug',$plugin['slug'])->first() ])}}" data-width="400" data-fancybox data-type="ajax">التحكم في الاضافة</a>

                    @else
                    <form class="{{route('admin.plugins.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="slug" value="{{$plugin['slug']}}" class="not-countable">
                        <button class="rounded font-1 btn btn-success" onclick="var result = confirm('هل أنت متأكد من تفعيل الاضافة');if(result){}else{event.preventDefault()}">تفعيل الاضافة</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection
