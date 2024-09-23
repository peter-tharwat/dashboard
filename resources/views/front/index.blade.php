@extends('layouts.app',['title'=>"الرئيسية"])
@section('content')
@php
$page = \App\Models\Page::where('home',1)->firstOrFail();
@endphp
<div class="col-12 p-0 ">
    @if(is_countable(json_decode($page->content,true)))
    @foreach(json_decode($page->content,true) as $component)
    @include('components.page',['page'=>$page,'component'=>$component])
    @endforeach
    @endif
</div>
@endsection
