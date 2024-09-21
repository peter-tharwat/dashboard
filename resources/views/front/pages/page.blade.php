@extends('layouts.app',['page_title'=>$page->title,'page_description'=>$page->meta_description])
@section('content')
<div class="col-12 p-0 ">
  @if(is_countable(json_decode($page->content,true)))
  @foreach(json_decode($page->content,true) as $component)
  @include('components.page',['page'=>$page,'component'=>$component])
  @endforeach
  @endif
</div>
@endsection