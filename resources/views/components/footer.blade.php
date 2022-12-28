<footer class="bg-soft-primary pt-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-11 col-xxl-10 mx-auto">
        <div class="card image-wrapper bg-full bg-image bg-overlay bg-overlay-400 mt-n50p mb-n5" style="background:{{$settings['main_color']}}">
          <div class="card-body p-6 p-md-11 d-lg-flex flex-row align-items-lg-center justify-content-md-between text-center text-lg-start">
            <h3 class="display-6 mb-6 mb-lg-0 pe-lg-15 pe-xxl-18 text-white">كن ايجابيا وساعد في تطوير اللوحة أكثر في كل مرة تستخدمها في مشروع جديد.</h3>
            <a href="https://www.paypal.me/nafezlycom" class="btn btn-white rounded-pill mb-0 text-nowrap">قدم مساعدة</a>
          </div>
          <!--/.card-body -->
        </div>
        <!--/.card -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <div class="container pb-4 text-center">
    <div class="row mt-n10 mt-lg-0">
      <div class="col-xl-12 mx-auto">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="widget">
              <img src="{{$settings['get_website_wide_logo']}}" style="width:160px;max-width:100%">
              <div class="widget-title">{{$settings['website_bio']}}</div>
            </div>
            <!-- /.widget -->
          </div>


          
          <!--/column -->
          <div class="col-md-3">
            <div class="widget">
              <h4 class="widget-title">روابط</h4>
              @php
              $footer_menu = \App\Models\Menu::where('location',"FOOTER")->with(['links'=>function($q){$q->orderBy('order','ASC');}])->first();
              @endphp
              @if($footer_menu !=null)
              @foreach($footer_menu->links as $link)
              <div class="col-auto  d-none d-lg-flex align-items-center p-0 mx-1 " >
                  <a href="{{$link->url}}" class="d-flex align-items-center p-1 rounded" style="color: inherit;">
                      <span class="{{$link->icon}} ms-1"></span> {{$link->title}}
                  </a>
              </div>
              @endforeach
              @endif
            </div>
            <!-- /.widget -->
          </div>
          <!--/column -->
          <div class="col-md-3">
            <div class="widget">
              <h4 class="widget-title">تابعنا</h4>
              <nav class="nav social">
                @if($settings['twitter_link']!=null)
                <a href="{{$settings['twitter_link']}}"><i class="fab fa-twitter"></i></a>
                @endif
                @if($settings['facebook_link']!=null)
                <a href="{{$settings['facebook_link']}}"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if($settings['instagram_link']!=null)
                <a href="{{$settings['instagram_link']}}"><i class="fab fa-instagram"></i></a>
                @endif
                @if($settings['youtube_link']!=null)
                <a href="{{$settings['youtube_link']}}"><i class="fab fa-youtube"></i></a>
                @endif
              </nav>
            </div>
            <!-- /.widget -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <p class="text-center"> جميع الحقوق محفوظة © {{date('Y')}} {{$settings['website_name']}}   <a href="https://nafezly.com/u/Peter__Tharwat">Peter Ayoub</a></p>
        
        <!-- /.social -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</footer>