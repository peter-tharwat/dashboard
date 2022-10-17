<footer class="bg-soft-primary pt-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-11 col-xxl-10 mx-auto">
        <div class="card image-wrapper bg-full bg-image bg-overlay bg-overlay-400 mt-n50p mb-n5" data-image-src="/assets/img/photos/4.png">
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
  <div class="container pb-12 text-center">
    <div class="row mt-n10 mt-lg-0">
      <div class="col-xl-10 mx-auto">
        <div class="row mb-3">
          <div class="col-md-4">
            <div class="widget">
              <h4 class="widget-title">تأكد تماماً بأنها</h4>
              <address>طورت بكل حب لأجلك </address>
            </div>
            <!-- /.widget -->
          </div>
          <!--/column -->
          <div class="col-md-4">
            <div class="widget">
              <h4 class="widget-title">انضم إلى مجتمعنا</h4>
              <p><a href="https://www.facebook.com/groups/web.developers.tips">مجتمع مطوري الويب</a></p>
            </div>
            <!-- /.widget -->
          </div>
          <!--/column -->
          <div class="col-md-4">
            <div class="widget">
              <h4 class="widget-title">البريد الإلكتروني</h4>
              <p><a href="mailto:PeterAyoub@nafezly.com" class="link-body">PeterAyoub@nafezly.com</a></p>
            </div>
            <!-- /.widget -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <p class="text-center">© {{date('Y')}} <a href="https://nafezly.com/u/Peter__Tharwat">Peter Ayoub</a>. جميع الحقوق محفوظة.</p>
        <nav class="nav social justify-content-center">
          @if($settings->twitter_link!=null)
          <a href="{{$settings->twitter_link}}"><i class="fab fa-twitter"></i></a>
          @endif
          @if($settings->facebook_link!=null)
          <a href="{{$settings->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
          @endif
          @if($settings->instagram_link!=null)
          <a href="{{$settings->instagram_link}}"><i class="fab fa-instagram"></i></a>
          @endif
          @if($settings->youtube_link!=null)
          <a href="{{$settings->youtube_link}}"><i class="fab fa-youtube"></i></a>
          @endif
        </nav>
        <!-- /.social -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</footer>