@extends('front.app',['page_title'=>'اتصل بنا'])

@section('content')
<section class="anim-bg contact-header" style="height: 298px;background-color: white;">
    <div> 
        <img src="{{Voyager::image('content/logo.webp')}}" alt="">
    </div>
    </section>
    <section class="contact-data container-fluid" style="padding:0px">
        <div class="row">
            <div class="col" style="text-align: center">
                <h1 class="contact-header" style="display: inline-block">معلومات التواصل</h1>
            </div>
        </div>
       <div class="row">
           <div class="col-md-4 col-sm-12" style="padding :0px">
            <div class="card contact-card" style="width:350px;">
                {!! setting('site.center_map') !!}
                <h4 class="card-title">عنواننا</h4>
                  <div class="card-text contact-text">
                    <p class="editor-address"><i class="fas fa-map-marker-alt"></i> الموقع الجغرافي : </p>
                    <div>{{setting('site.center_address')}}</div>
                    <p class="editor-address"><i class="fas fa-calendar"></i> أوقات الدوام : </p>
                    <div>{{setting('site.center_dawam')}}</div>
                  </div>
                 </div>
              </div>
           <div class="col-md-4 col-sm-12"  style="padding :0px"><div class="card contact-card" style="width:350px;">
            <img src="img/contact-social.webp" alt="" >
            <h4 class="card-title">مواقع التواصل الاجتماعي</h4>
              <div class="card-text contact-text social-text" >
                <p class="editor-address"><i class="fab fa-facebook"></i> <a href="{{setting('site.center_facebook')}}"> موقعنا على فيسبوك</a> </p>
                <p class="editor-address"><i class="fab fa-twitter"></i><a href="{{setting('site.center_twitter')}}"> موقعنا على تويتر </a></p>
                <p class="editor-address"><i class="fab fa-youtube"></i><a href="{{setting('site.center_youtube')}}"> تابع قناتنا على يوتيوب </a></p>
               
              </div>
             </div>
          </div>
           <div class="col-md-4 col-sm-12"  style="padding :0px">
            <div class="card contact-card" style="width:350px;">
            <img src="img/contact-email.webp" alt="" >
            <h4 class="card-title">الهاتف والبريد</h4>
              <div class="card-text contact-text social-text">
                 <p class="editor-address"><i class="fa fa-phone"></i><span>{{setting('site.center_phone')}} </span></p>
                 <p class="editor-address"><i class="fab fa-whatsapp"></i> <span>{{setting('site.center_whatsapp')}}</span> </p>               
                 <p class="editor-address"><i class="fa fa-envelope"></i><span>{{setting('site.center_email')}}</span></p>
               
              </div>
             </div>
          </div>
        </div>
    </section>
    <section class="medium-padding120 bg-body  contact-form-animation scrollme">
        <div class="container" style="padding:0px">
            <div class="row" style="text-align: center">
                <div class="col">
                    <h1 class="contact-header">لمقترحاتك وأسئلتك</h1>
                </div>
            </div>
            <div class="row">
                <div class="col col-xl-10 col-lg-10 col-md-12 col-sm-12  m-auto">
    
                    
                    <!-- Contacts Form -->
                    
                    <div class="contact-form-wrap">
                        <div class="contact-form-thumb">
                            <h2 class="title">راسلنا</h2>
                            <p>هل لديك سؤال أومقترح للمركز المدني ، راسلنا </p>
                            <img src="img/crew.webp" alt="crew" class="crew" style="opacity: 1; left: 77%; transform: scale(1);">
                        </div>
                        <form class="contact-form">
                            <div class="form-group">
                              <label for="exampleInputEmail1">عنوان بريدك الإلكتروني</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                               </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">الموضوع</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">المقترح أو السؤال</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                            <button type="submit" class="btn btn-primary contact-submit">إرسال</button>
                          </form>
                    </div>
                    
                    <!-- ... end Contacts Form -->
    
                </div>
            </div>
        </div>
    
        <div class="half-height-bg bg-white"></div>
    </section>
@endsection