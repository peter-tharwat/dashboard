@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.redirections.store')}}">
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
						الرابط القديم
					</div>
					<div class="col-12 pt-3">
						<input type="url" name="url" required  class="form-control" value="{{old('url')}}" >
					</div>
				</div>

				<div class="col-12 col-lg-6 p-2">
					<div class="col-12">
						الرابط الجديد
					</div>
					<div class="col-12 pt-3">
						<input type="text" name="new_url" required  class="form-control"  value="{{old('new_url')}}" >
					</div>
				</div> 
				<div class="col-12 col-lg-6 p-2">
					<div class="col-12">
						نوع التحويل
					</div>
					<div class="col-12 pt-3">
						<select name="code" required class="form-control">
							<option value selected disabled hidden>إحتر نوع التحويل</option>
							<option value="301" @if(old('code')=="301") selected @endif>دائم</option>
							<option value="302" @if(old('code')=="302") selected @endif>مؤقت</option>
						</select>
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