@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.article-comments.update',$article_comment)}}">
            @csrf
            @method("PUT")
            <div class="col-12 col-lg-8 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span>  {{ __('lang.edit_comment') }}
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                    <div class="col-12"></div>
                    @if($article_comment->user_id==null)
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            
                            {{ __('lang.contributor_name') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="adder_name" maxlength="190" class="form-control" value="{{old('adder_name',$article_comment??"")}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            {{ __('lang.contributor_email') }}
                        </div>
                        <div class="col-12 pt-3">
                            <input type="email" name="adder_email" maxlength="190" class="form-control" value="{{old('adder_email',$article_comment??"")}}">
                        </div>
                    </div>
                    @endif
                    <div class="col-12 col-lg-12 p-2">
                        <div class="col-12">
                            {{ __('lang.content') }}
                        </div>
                        <div class="col-12 pt-3">
                            <textarea name="content" class="form-control" style="min-height:150px">{{old('content',$article_comment??"")}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 p-2">
                        <div class="col-12">
                            {{ __('lang.reviewed') }}
                        </div>
                        <div class="col-12 pt-3">
                            <select class="form-control" name="reviewed">
                                <option @if(old('reviewed',$article_comment??"")=="0" ) selected @endif value="0">  {{ __('lang.no') }}</option>
                                <option @if(old('reviewed',$article_comment??"")=="1" ) selected @endif value="1">  {{ __('lang.yes') }}</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">  {{ __('lang.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
