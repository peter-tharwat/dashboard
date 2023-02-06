@extends('layouts.user')
@section('user-content')


<div class="col-12 col-lg-8 mx-auto ">

                    <div class="box-item-title shadow p-5" style="background:#fff;border-radius: 8px;">
                      
                        <div class="hero">
                            <form action="{{route('user.store-ticket')}}" class="row justify-content-center" method="POST" enctype="multipart/form-data">
                                @csrf

                                

                                <div class="col-lg-11 col-12 mb-3">
                                    <label class="form-label">التذكرة</label>
                                    <textarea class="form-control" style="min-height: 200px" placeholder="محتوى الرسالة" name="message"></textarea>
                                </div>
                                <div class="col-lg-11 col-12 mb-3">
                                    <label class="form-label">ارفاق ملفات</label>
                                    <div class="footer-form" style="position:relative;">
                                        <div class="r-file" data-bs-toggle="collapse" href="#paperclip">
                                            <span class="fal fa-file-invoice border" style="width: 43px;height: 43px;background: var(--blue-light);border-radius: 5px;color: var(--white);display: flex;justify-content: center;align-items: center;font-size: var(--font-14);cursor: pointer;transition: 0.3s ease;"></span></div>
                                        <input type="file" name="files" class="form-control upload-file-input" multiple style="width: 43px;height: 43px;position: absolute;top: 0px;right: 0px;opacity: 0;">

                                        
                                       

                                    </div>
                                </div>


                                <div class="col-lg-11 col-12 mb-3 ">
                                    <button type="submit" class="btn btn-outline-warning">افتح التذكرة</button>
                                </div>
            

                            </form>
                        </div>
                    </div>

                </div>


@endsection
