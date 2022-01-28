@extends('layouts.app',['page_title'=>"المدونة"])
@section('content')
<div class="col-12 p-0">
	<div class=" p-0 container">
		<div class="col-12 p-2 p-lg-3 row">
			<div class="col-12 px-2 pt-5 pb-3">
			    <div class="col-12 p-0 font-4">
			        <span class="start-head"></span> المدونة
			    </div>
			    <div class="col-12 p-0 mt-1" style="opacity: .7;">
			        نشارك أحدث المواضيع والمقالات 
			    </div>
			</div>
			<div class="col-12 p-2">
				@foreach($articles as $article)
				<div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2">
					<div class="col-12 p-2 main-box-styles" style="background:#fff" >
						<a href="{{route('article.show',$article)}}">
						<img src="{{$article->main_image()}}" style="width:100%;height:220px">
						<div class="col-12 p-2">
							{{$article->title}}
						</div>
						</a>
					</div>
				</div>
				@endforeach

				<div class="col-12 p-2">
					{{$articles->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection