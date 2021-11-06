@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-6 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 px-3 py-3">
			 	<span class="fal fa-info-circle"></span>	إضافة جديد
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>
		<form id="validate-form">
		<div class="col-12 p-3">
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
					<textarea type="text" name="description" required minlength="3" maxlength="10000" class="form-control editor"  ></textarea>
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
			<div class="col-12 p-2">
				<button class="btn btn-success">حفظ</button>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection
