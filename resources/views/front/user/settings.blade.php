@extends('layouts.user')
@section('user-content')
<style type="text/css">
    /*.croppie-container .cr-viewport{
            box-shadow: 0 0 2000px 2000px rgba(0,0,0,0.5)!important;
    }
    .cr-image{
    	opacity: 1; transform: translate3d(-26.8762px, -9.88808px, 0px) scale(1.0007); transform-origin: 176.876px 159.888px;
    }
    .ltr , .ltr *{
        direction: ltr!important;
        text-align: unset;
    }*/
    .main-box{
    	background:#fff;
    	border-radius:8px;
    }
    .divider:after{
    	background:#f1f1f1!important;
    	height:2px!important;
    }
</style>
<button data-bs-toggle="modal" data-bs-target="#changeAvatar" id="changeAvatarBtn" class="d-none"></button>
<div class="modal fade " id="changeAvatar" tabindex="-1" aria-labelledby="changeAvatarLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:394px;max-width: 100%">
    <div class="modal-content">
      <div class="modal-header" style="padding: 14px 27px;">
        <h5 class="modal-title" id="changeAvatarLabel">تغيير الصورة الشخصية</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding:0pc">
      
        <div class="col-12 p-2" style="background: #fff;overflow: hidden;position: relative;max-width: 100%!important">
            <div class="col-12 ltr">
                <img class="my-image" src="" id="avatar-image-selector" style="z-index: 45454" />
            </div>
            <div class="col-12 text-left
             mt-3">
                <button class="btn btn-secondary mx-1 font-1" data-bs-dismiss="modal" aria-label="Close">إلغاء</button>
                <button class="btn btn-outline-warning mx-1 font-1 save-image" >تغيير الصورة</button>
            </div>
        </div>

      </div> 
    </div>
  </div>
</div>
<div class="col-12 py-3">
	<div class="container">
		<div class=" d-flex row m-0">
			<div class="col-12 col-lg-6 my-2">
				<form method="POST" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
					@csrf
					@method("PUT")
					<div class="col-12 p-0 main-box shadow">
						<div class="col-12 px-0">
							<div class="col-12 px-3 py-3">
							 	<span class="fal fa-info-circle"></span>	البيانات الأساسية
							</div>
							<div class="col-12 divider" style="min-height: 2px;"></div>
						</div>
						<div class="col-12 p-3">
							<div class="col-12 py-2 px-0 d-flex justify-content-center">
									<img src="{{auth()->user()->getUserAvatar()}}" style="width:150px;max-width: 100%;border-radius: 50%;" id="getUserAvatar">
							</div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    الصورة الشخصية
                                </div>
                                <div class="col-12 pt-3">
                                    <input type="file" name=""  class="form-control" value="{{auth()->user()->name}}" id="avatar-image">
                                    <input type="hidden" name="avatar" id="encoded_image">
                            </div>
                            </div>
							<div class="col-12 p-2">
								<div class="col-12">
									اسم المستخدم
								</div>
								<div class="col-12 pt-3">
									<input type="text" name="name" required min="3" max="190" class="form-control" value="{{auth()->user()->name}}" accept="image/*">
								</div>
							</div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    النبذة
                                </div>
                                <div class="col-12 pt-3">
                                    <textarea class="form-control" name="bio" style="min-height:150px">{{auth()->user()->bio}}</textarea>
                                </div>
                            </div>
							

							<div class="col-12 p-2">
								<div class="col-12 pt-3">
									<button class="btn btn-outline-warning">حفظ البيانات</button>
									
								</div>
							</div>


						</div>
					</div>
				</form>
			</div>

            <div class="col-12 col-lg-6 my-2">
                <form method="POST" action="{{route('admin.profile.update-email')}}" >
                    @csrf
                    @method("PUT")
                    <div class="col-12 p-0 main-box shadow">
                        <div class="col-12 px-0">
                            <div class="col-12 px-3 py-3">
                                <span class="fal fa-envelope"></span> تغيير البيرد الاكتروني
                            </div>
                            <div class="col-12 divider" style="min-height: 2px;"></div>
                        </div>
                        <div class="col-12 p-3">
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    البريد الالكتروني الحالي
                                </div>
                                <div class="col-12 pt-3">
                                    <input type="email" name="old_email" class="form-control" required value="{{auth()->user()->email}}">
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="col-12">
                                    البريد الالكتروني الجديد
                                </div>
                                <div class="col-12 pt-3">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    تأكيد البريد الالكتروني الجديد
                                </div>
                                <div class="col-12 pt-3">
                                    <input type="email" name="email_confirmation" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="col-12 pt-3">
                                    <button class="btn btn-outline-warning">تغيير البريد الالكتروني</button>
                                    
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-lg-6 my-2">
                <form method="POST" action="{{route('admin.profile.update-password')}}" >
                    @csrf
                    @method("PUT")
                    <div class="col-12 p-0 main-box shadow">
                        <div class="col-12 px-0">
                            <div class="col-12 px-3 py-3">
                                <span class="fal fa-key"></span>  كلمة المرور
                            </div>
                            <div class="col-12 divider" style="min-height: 2px;"></div>
                        </div>
                        <div class="col-12 p-3">
                            <div class="col-12 p-2">
                                <div class="col-12 pt-3">
                                    <div class="alert alert-warning">
                                        يفضل إستخدام كلمة مرور مكونة من أحرف وأرقام وعلامات خاصة مثل ( % $ # @ )
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    كلمة المرور الحالية
                                </div>
                                <div class="col-12 pt-3">
                                    <input type="password" name="old_password" class="form-control" required minlength="8" maxlength="190" >
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="col-12">
                                    كلمة المرور الجديدة
                                </div>
                                <div class="col-12 pt-3">
                                    <input type="password" name="password" class="form-control" required minlength="8" maxlength="190" >
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12">
                                    تأكيد المرور الجديدة
                                </div>
                                <div class="col-12 pt-3">
                                    <input type="password" name="password_confirmation" class="form-control" required minlength="8" maxlength="190" >
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="col-12 pt-3">
                                    <button class="btn btn-outline-warning">تغيير كلمة المرور</button>
                                    
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>

		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
<script type="module">
$(document).ready(function() { 
    //$('body').css({'background':"#333"});


        var $uploadCrop = $('#avatar-image-selector').croppie({
            aspectRatio:1,
            viewport: {
                width: 300,
                height: 300,
                type: 'square'
            },
            boundary: {
                width: 350,
                height: 350
            },
            enableExif: true
        }); 

        function readFile(input) { 
            if (input.files && input.files[0]) {
                var reader = new FileReader(); 
                reader.onload = function (e) {
                    $('#changeAvatarBtn').click();
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function(){  
                        
                    }); 
                }          
                reader.readAsDataURL(input.files[0]); 
                $('.cr-image').css(
                     {
                        'transform':'translate3d(0px, 0px, 0px) scale(0.9787)',
                        'transform-origin':'0px 0px'
                     }
                 ); 
                 $('.cr-overlay').css(
                    {
                        'width':'667.8px',
                        'height':'667.8px',
                        'top':'-26.2914px',
                        'left':'-129.291px',
                        'cr-overlay':'5'
                    }
                 );
                 $('.cr-slider').attr({'min':0.1, 'max':1.5}); 
            }
            else { 
            }
        }
        function popupResult(result) { 
        	$('#getUserAvatar').attr('src',result.src);
        	$('#changeAvatar .btn-close').click();
        	$('#encoded_image').val(result.src);

        } 

        $('#avatar-image').on('change', function () { 
            readFile(this); 
        });
        $('.save-image').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (resp) {
                popupResult({
                    src: resp
                });
            });
        });
});
</script>
@endsection