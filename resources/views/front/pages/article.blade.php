@extends('layouts.app',['page_title'=>$article->title,'page_description'=>$article->meta_description,'page_image'=>$article->main_image()])
@section('content')
<style type="text/css">
.article img,
iframe {
    max-width: 100%;
}

pre[class*=language-] {
    background: #24292e !important;
    border-radius: 10px !important;
}

code[class*=language-],
code * {
    font-family: monospace !important;
}

code[class*=language-],
pre[class*=language-] {
    white-space: pre !important;
}

.token.class-name,
.token.constant,
.token.property,
.token.symbol {
    color: #79b8f2 !important;
}

.token.entity,
.token.operator,
.token.url {
    color: #F97583 !important;
}

.token.attr-value,
.token.char,
.token.regex,
.token.string,
.token.variable {
    color: #9ECBFF !important;
}

.token.boolean,
.token.function,
.token.number {
    color: #B392F0 !important;
}

</style>
<div class="col-12 p-0 mb-15">
    <div class="container p-0">
        <div class="col-12 p-2 row d-flex">
            <div class="col-12 col-lg-8 p-2">
                <div class="col-12 p-2 p-lg-3 rounded-2" style="background: var(--bg-main);">
                    <figure class="card-img-top"><img src="{{$article->main_image()}}" alt="" data-fancybox /></figure>
                    <div class="col-12 p-4 card-body">
                        <div class="post-category text-line mt-3 ">
                            @foreach($article->categories as $article_category)
                            @if($loop->index<5) <a href="{{route('category.show',$article_category)}}" class="hover pe-2" rel="category">{{$article_category->title}}</a>
                                @endif
                                @endforeach
                        </div>
                        <h1 class="font-3 font-lg-5 mb-4 ">{{$article->title}}</h1>
                        <ul class="post-meta mb-5">
                            <li class="post-date font-1"><i class="fal fa-calendar-alt"></i><span> {{\Carbon::parse($article->created_at)->diffForHumans()}}</span></li>
                            <li class="post-author font-1"><a href="{{route('blog',['user_id'=>$article->user->id])}}" class="font-1"><i class="fal fa-user"></i><span> {{$article->user->name}}</span></a></li>
                            @if($article->comments_count!=0)
                            <li class="post-comments"><a href="#comments"><i class="fal fa-comment"></i> {{$article->comments_count}}<span> تعليقات</span></a></li>
                            @endif
                            @if($article->views!=0)
                            <li class="post-comments"><a href="#comments"><i class="fas fa-fa-thin fa-eyes"></i> {{$article->views}}<span> مشاهدة</span></a></li>
                            @endif
                        </ul>
                        <div class="classic-view">
                            <article class="post">
                                {!!$article->description!!}
                            </article>
                        </div>
                        @if(count($article->tags))
                        <div class="post-category text-line">
                            @foreach($article->tags as $article_tag)
                            @if($loop->index<5) <a href="{{route('tag.show',$article_tag)}}" class="hover pe-2" rel="tag">#{{$article_tag->tag_name}}</a>
                                @endif
                                @endforeach
                        </div>
                        @endif
                        {{-- <div class="author-info d-md-flex align-items-center mb-3 text-center col-12">
                            <div class="d-flex align-items-center row mx-auto">
                                <div class="col-12 text-center d-flex align-items-center justify-content-center ">
                                    <figure class="user-avatar m-0"><a href="{{route('blog',['user_id'=>$article->user->id])}}" class="link-dark font-1"><img class="rounded-circle m-0" alt="" src="{{$article->user->getUserAvatar()}}" /></a></figure>
                                </div>
                                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                                    <h6><a href="{{route('blog',['user_id'=>$article->user->id])}}" class="link-dark font-1">{{$article->user->name}}</a></h6>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12 p-0">
                            @if($article->comments_count)
                            <hr />
                            <div id="comments">
                                <h3 class="mb-6">{{$article->comments_count}} التعليقات</h3>
                                <ol id="singlecomments" class="commentlist">
                                    @foreach($article->comments as $comment)
                                    <li class="comment">
                                        <div class="comment-header d-md-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <figure class="user-avatar ms-2 me-0"><img class="rounded-circle" alt="" src="{{$comment->user==null?env('DEFAULT_IMAGE_AVATAR'):$comment->user->getUserAvatar()}}" style="width:40px;height:40px" /></figure>
                                                <div>
                                                    <h6 class="comment-author"><a href="#" class="link-dark font-1">{{$comment->user==null?$comment->adder_name:$comment->user->name}}</a></h6>
                                                    <ul class="post-meta">
                                                        <li><i class="fal fa-calendar-alt"></i> {{\Carbon::parse($comment->created_at)->diffForHumans()}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p>{{$comment->content}}</p>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                            @endif
                            <hr />
                            <h3 class="mb-3">شاركنا رأيك</h3>
                            <p class="mb-7">بريدك الالكتروني لن يتم نشره.</p>
                            <form class="comment-form" method="POST" action="{{route('comment-post')}}">
                                @csrf
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                @guest
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" placeholder="الاسم*" id="c-name" name="adder_name">
                                    <label for="c-name">الاسم *</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" placeholder="البريد الإلكتروني*" id="c-email" name="adder_email">
                                    <label for="c-email">البريد الإلكتروني*</label>
                                </div>
                                @endguest
                                <div class="form-floating mb-4">
                                    <textarea name="content" class="form-control" placeholder="تعليقك" style="height: 150px"></textarea>
                                    <label>تعليقك *</label>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill mb-0">اضافة تعليق</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 p-2 mb-4" >
              <div style="position: sticky;top: 85px;">
                
              
              <div class="col-12 mb-2" style="background:var(--bg-main);border-radius: 6px;">
                <form method="GET" action="{{route('blog')}}" class="p-4">
                  <input type="text" name="q" class="form-control" placeholder="بحث ..">
                </form>
              </div>

              <div class="col-12 mb-2 p-3" style="background:var(--bg-main);border-radius: 6px;">
                <img src="{{$article->main_image('thumb')}}" style="width:100%">
              </div>


              <div class="col-12 p-0" style="background:var(--bg-main);border-radius: 6px;">
                
              
         
                <div class="col-12 p-2">
                    <div class="col-12 p-0">
                        <div class="col-12 aside-post " style="background: var(--second-background);border-radius: 5px;">
                          @php
                          $random_articles = \App\Models\Article::orderBy('id','DESC')->with(['categories'=>function($q){$q->first();}])->paginate(5);
                          @endphp

                          @foreach($random_articles as $single_article)
                            <div class="col-12 p-0 d-flex row">
                                <div style="width: 65px;padding: 3px;border-radius: 5px;overflow: hidden;">
                                    <a href="{{route('article.show',$single_article)}}" class="px-0 d-flex">
                                        <img src="{{$single_article->main_image('tiny')}}" style="width:55px;height:55px">
                                    </a>
                                </div>
                                <div class="px-2" style="width:calc(100% - 75px)">
                                    <div style="font-size:13px;font-weight: bold;" class="col-12">
                                        <a href="{{route('article.show',$single_article)}}" class="px-0 d-flex" style="color:var(--font-color);">
                                            {{$single_article->title}} </a>
                                    </div>
                                    <div class="col-12 mt-1 font-small" style="overflow: hidden;filter: grayscale(1);">
                                        <div class="d-inline-block">
                                            <div class="d-inline-block">
                                              @foreach($single_article->categories as $single_article_category)
                                                @if($loop->index<5) <a href="{{route('category.show',$single_article_category)}}" class="px-0" >{{$single_article_category->title}}</a>
                                                    @endif
                                              @endforeach
                                            </div>
                                        </div>
                                        <span class="posted-on"><span rel="bookmark"><span class="d-inline-block px-0 font-small" ><time class="updated" >{{\Carbon::parse($single_article->created_at)->diffForHumans()}}</time><span></span></span>
                                            </span></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>

 
                </div>
              </div>
              </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
Fancybox.bind('.post img', {
    caption: function(fancybox, carousel, slide) {
        return (
            `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
        );
    },
});

</script>
@endsection
