
<div class="col-sm-6">
    <!-- post large -->
    <div class="post">
                    <div class="thumb rounded">
                        <a class="category-badge position-absolute">{{$title}}</a>
                        <a href="{{ url($posts[0]->category->slug.'/'.$posts[0]->slug) }}">
                            <div class="inner">
                                <img src="{{ $posts[0]->main_image() }}" alt="{{ $posts[0]->title }}" />
                            </div>
                        </a>
                    </div>
                    <ul class="meta list-inline mt-4 mb-0">
                        <li class="list-inline-item"><a href="{{url('authors/'.$posts[0]->editor->slug)}}"><img src="{{$posts[0]->editor->avatar('tiny')}}" class="author" alt="{{$posts[0]->editor->name}}"/>{{ $posts[0]->editor->name }}</a></li>
                        <li class="list-inline-item">{{date_format($posts[0]->created_at,"Y-m-d")}}</li>
                    </ul>
                    <h5 class="post-title mb-3 mt-3"><a href="{{ url($posts[0]->category->slug.'/'.$posts[0]->slug) }}">{{ $posts[0]->title }}</a></h5>
                    <p class="excerpt mb-0">{{ $posts[0]->meta_description }}</p>
    </div>
    <!-- post -->
    @foreach ($posts as $post)
        @if ($loop->first)
            @continue
        @endif
        <div class="post post-list-sm square before-seperator">
            <div class="thumb rounded">
                <a href="{{ url($post->category->slug.'/'.$post->slug) }}">
                    <div class="inner">
                        <img src="{{$post->main_image('tiny')}}" alt="{{ $post->title }}" />
                    </div>
                </a>
            </div>
            <div class="details clearfix">
                <h6 class="post-title my-0"><a href="{{ url($post->category->slug.'/'.$post->slug)}}">{{ $post->title }}</a></h6>
                <ul class="meta list-inline mt-1 mb-0">
                    <li class="list-inline-item">{{date_format($post->created_at,"Y-m-d")}}</li>
                </ul>
            </div>
        </div>
    @endforeach
</div>

