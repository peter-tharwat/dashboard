<footer class=" pt-5" style="background:#fff;border-top:1px solid #f1f1f1;">
 
  <div class="container pb-12 text-center pt-12">
    <div class="row mt-n10 mt-lg-0">
      <div class="col-xl-10 mx-auto">
        <div class="row mb-3 d-flex">
          <div class="col-md-6 mb-3">
            <div class="widget">
                <img src="{{$settings['get_website_wide_logo']}}" style="width:160px;max-width:100%" class="mb-3">
              <div style="text-align:justify;">{{$settings['website_bio']}}</div>
            </div>
            <!-- /.widget -->
          </div>
   
          <div class="col-md-3 mb-3">
            <div class="widget">
              <div class="widget-title display-6 mb-5" >روابط</div>

              @php
              $footer_menu = \App\Models\Menu::where('location',"FOOTER")->with(['links'=>function($q){$q->orderBy('order','ASC');}])->first();
              @endphp

              @if($footer_menu !=null)
                @foreach($footer_menu->links as $link)
                <div><a href="{{$link->url}}" class="link-body"><span class="{{$link->icon}} font-1 d-none" style="color: #0194fe;width: 15px"></span> {{$link->title}}</a></div>
                @endforeach
              @endif
          
 
            </div>
            <!-- /.widget -->
          </div>

          <div class="col-md-3 mb-3">
            <div class="widget">
              <div class="widget-title display-6 mb-5" >تابعنا</div>

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
        {{-- <p class="text-center">جميع الحقوق محفوظة ©  موقع بيت التك {{date('Y')}} </p> --}}
        
        <!-- /.social -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</footer>

<div class="col-12" style="background-image: linear-gradient(to right, rgba(0,0,0,0.01) , rgba(0,0,0,0.01) );border-top:1px solid rgb(145 145 145 / 3%);display: flex; align-items: center;justify-content: center;direction: rtl;"> <div class="container "> <div class="col-12 row d-flex justify-content-between p-0"> <div class="col-12 text-center mt-1 mb-2 pt-3 pb-2 "> <p style="font-size: 14px;line-height: 1.8;margin:0px" class="my-0  kufi text-center"><span class="d-inline-block kufi"> جميع الحقوق محفوظة © {{$settings['website_name']}} {{date('Y')}} </span> <span class="d-inline-block kufi"> All rights reserved</span></p> </div> </div> </div> </div>