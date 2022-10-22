@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.teams.store')}}">
            @csrf
            <div class="col-12 col-lg-8 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> إضافة جديد
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">

                    




                    <div class="col-12 p-0 text-center mb-3">
                        <img src="{{isset($team)?$team->image():env('DEFAULT_IMAGE_AVATAR')}}" style="width:120px;height: 120px;border-radius:50%">
                    </div>




                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            اسم العضو 
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="title" required maxlength="190" class="form-control" value="{{old('title',$team??"")}}" >
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            المسمى الوظيفي
                        </div>
                        <div class="col-12 pt-3">
                            <input type="text" name="job_title" required maxlength="190" class="form-control" value="{{old('job_title',$team??"")}}" >
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 p-2">
                        <div class="col-12">
                           نبذة عن العضو
                        </div>
                        <div class="col-12 pt-3">
                            <textarea class="form-control" name="description" required maxlength="190" style="min-height:150px">{{old('description',$team??"")}}</textarea>
                        </div>
                    </div>

                  
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            رابط فيسبوك
                        </div>
                        <div class="col-12 pt-3">
                            <input type="url" name="facebook_link" class="form-control" value="{{old('facebook_link',$team??"")}}" >
                        </div>
                    </div>


                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            رابط لينكد ان
                        </div>
                        <div class="col-12 pt-3">
                            <input type="url" name="linkedin_link" class="form-control" value="{{old('linkedin_link',$team??"")}}" >
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            رابط واتس آب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="url" name="whatsapp_link" class="form-control" value="{{old('whatsapp_link',$team??"")}}" >
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            رابط تويتر
                        </div>
                        <div class="col-12 pt-3">
                            <input type="url" name="twitter_link" class="form-control" value="{{old('twitter_link',$team??"")}}" >
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            رابط الموقع
                        </div>
                        <div class="col-12 pt-3">
                            <input type="url" name="website_link" class="form-control" value="{{old('website_link',$team??"")}}" >
                        </div>
                    </div> 

                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            صورة العضو
                        </div>
                        <div class="col-12 pt-3">
                            <input type="file" name="image" class="form-control" value="{{old('image',$team??"")}}" accept="image/*" >
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
