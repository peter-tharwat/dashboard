@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 px-3 py-3">
			 	<span class="fal fa-info-circle"></span>	إضافة جديد
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>
		<form id="validate-form" class="row" enctype="multipart/form-data">
		<div class="col-12 col-lg-8 p-3">
			<div class="col-12 p-2">
				<div class="col-12">
					عنوان المقال
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3" maxlength="190" class="form-control"  >
				</div>
			</div>
			<div class="col-12 p-2">
				<div class="col-12">
					عنوان المقال
				</div>
				<div class="col-12 pt-3">
					<textarea type="text" name="description" required minlength="3" maxlength="10000" class="form-control editor with-file-explorer"  ></textarea>
				</div>
			</div>
			<div class="col-12 p-2">
				<div class="col-12">
					عنوان المقال
				</div>
				<div class="col-12 pt-3">
					<textarea type="text" name="description" required minlength="3" maxlength="10000" class="form-control editor"  ></textarea>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-4 p-3">
			<div class="col-12 p-2">
				<div class="col-12">
					عنوان المقال
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3" maxlength="190" class="form-control"  >
				</div>
			</div>

			 <div class="col-12  px-0 mt-2 px-0">
                <div class="col-12  mt-3 font-1 ">
                    الصورة الرئيسية 
                </div>
                <div class="col-12 mt-2" style="overflow: hidden">
                    <div class="col-12 px-0" id="file-uploader-nafezly-main">
                        <input name="file" type="file" multiple class="file-uploader-files" data-fileuploader-files="" style="opacity: 0" data-fileuploader-listInput="fileuploader-list-file-main" />
                    </div> 
                </div>
            </div>

            <div class="col-12  px-0 mt-2 px-0">
                <div class="col-12  mt-3 font-1 ">
                    صور العمل
                </div>
                <div class="col-12 mt-2" style="overflow: hidden">
                    <div class="col-12 px-0" id="file-uploader-nafezly-second">
                        <input type="hidden" name="uploaded_files" value="" class="file-uploader-uploaded-files">
                        <input name="file" type="file" multiple class="file-uploader-files" data-fileuploader-files="" style="opacity: 0" />
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
@section('scripts')
@include('admin.templates.dropzone',[
'selector'=>'#file-uploader-nafezly-main',
'url'=> route('admin.upload.file'),
'method'=>'POST',
'remove_url'=>route('admin.upload.remove-file'),
'remove_method'=>'POST',
'enable_selector_after_upload'=>'#submitEvaluation',
'max_files'=>1,
'max_file_size'=>'50',
'accepted_files'=>"['image/*']"
])
<!--images-->
@include('admin.templates.dropzone',[
'selector'=>'#file-uploader-nafezly-second',
'url'=> route('admin.upload.file'),
'method'=>'POST',
'remove_url'=>route('admin.upload.remove-file'),
'remove_method'=>'POST',
'enable_selector_after_upload'=>'#submitEvaluation',
'max_files'=>100,
'max_file_size'=>'50',
'accepted_files'=>"['image/*']"
])
@endsection