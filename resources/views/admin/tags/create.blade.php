@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.tags.store')}}">
            @csrf
            <div class="col-12 col-lg-8 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> إضافة جديد
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            اسم المهارة 
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="tag_name" required maxlength="190" class="form-control" value="{{old('tag_name',$tag??"")}}" placeholder="مثال: تصميم الجرافيك">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            الاسم باللغة العربية
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="arabic_name" required maxlength="190" class="form-control" value="{{old('arabic_name',$tag??"")}}" placeholder="مثال: التصميم الجرافيكي">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            الاسم باللغة الانجليزية 
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="english_name" required maxlength="190" class="form-control" value="{{old('english_name',$tag??"")}}" placeholder="مثال: Graphic Design">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            رمز المهارة
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="slug" required maxlength="190" class="form-control" value="{{old('slug',$tag??"")}}" placeholder="مثال: graphic-design">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">حفظ</button>
            </div>
        </form>
    </div>
</div>
@endsection
