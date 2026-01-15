@extends('layouts.app',['title'=>"الرئيسية"])
@section('content')
@php
$page = cache()->remember('page_home',60,function(){
    return \App\Models\Page::where('home',1)->firstOrFail();
});
@endphp
<div class="col-12 p-0 ">
  @if(is_countable(json_decode($page->content,true)))
  @foreach(\MainHelper::arrayToObject(json_decode($page->content,true)) as $component)
  @include('components.component-render',['page'=>$page,'component'=>$component])
  @endforeach
  @endif
</div>
@endsection




