<section class="container-xl hero-carousel">
  <div class="row post-carousel-featured post-carousel">
    @foreach ($posts as $post)
        <!-- post -->
        <div class="post featured-post-md">
            <div class="details clearfix">
                <a href="{{url('/'.$post->category->slug)}}" class="category-badge">{{ $post->category->title }}</a>
                <h4 class="post-title"><a href="{{ url($post->category->slug.'/'.$post->slug) }}">{{ $post->title }}</a></h4>
                <ul class="meta list-inline mb-0">
                    <li class="list-inline-item"><a href="{{url('/authors/'.$post->editor->slug)}}">{{$post->editor->name}}</a></li>
                    <li class="list-inline-item">{{date_format($post->created_at,"Y-m-d")}}</li>
                </ul>
            </div>
            <a href="blog-single.html">
                <div class="thumb rounded">
                    <div class="inner data-bg-image" data-bg-image="{{$post->main_image()}}"></div>
                </div>
            </a>
        </div>   
    @endforeach
  </div>
</section>