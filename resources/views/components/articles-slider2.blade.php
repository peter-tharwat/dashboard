<section class="wrapper bg-light">
  <style type="text/css">
    .swiper-navigation{
      transform: rotate(180deg)!important;
    }
  </style>
  <div class="container py-14 py-md-16">
    <div class="row">
      <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto">
        <h2 class="fs-15 text-uppercase text-primary text-center">آخر آخبارنا</h2>
        <h3 class="display-4 mb-6 text-center">نشارك معك آخر الأخبار الخاصة بنا.</h3>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="position-relative">
      <div class="shape bg-dot primary rellax w-17 h-20" data-rellax-speed="1" style="top: 0; left: -1.7rem;"></div>
      <div class="swiper-container dots-closer blog grid-view mb-6" data-margin="0" data-dots="true" data-items-xl="3" data-items-md="2" data-items-xs="1">
        <div class="swiper">
          <div class="swiper-wrapper">

            @for($i=0;$i<10;$i++)
            <div class="swiper-slide">
              <div class="item-inner">
                <article>
                  <div class="card">
                    <figure class="card-img-top overlay overlay-1 hover-scale"><a href="#"> <img src="/assets/img/photos/7.jpg" alt="" /></a>
                      <figcaption>
                        <h5 class="from-top mb-0 text-center">عرض المزيد</h5>
                      </figcaption>
                    </figure>
                    <div class="card-body">
                      <div class="post-header">
                        <div class="post-category text-line">
                          <a href="#" class="hover" rel="category">ريادة الأعمال</a>
                        </div>
                        <!-- /.post-category -->
                        <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="#">نص عشوائي يمكن أن يستبدل في نفس المساحة</a></h2>
                      </div>
                      <!-- /.post-header -->
                      <div class="post-content">
                        <p>نص عشوائي يمكن أن يستبدل في نفس المساحة.</p>
                      </div>
                      <!-- /.post-content -->
                    </div>
                    <!--/.card-body -->
                    <div class="card-footer">
                      <ul class="post-meta d-flex mb-0">
                        <li class="post-date"><i class="fal fa-calendar-alt"></i> <span>14 Apr 2022</span></li>
                        <li class="post-comments"><a href="#"><i class="fal fa-comment"></i> 4</a></li>
                        <li class="post-likes ms-auto"><a href="#"><i class="fal fa-heart"></i> 5</a></li>
                      </ul>
                      <!-- /.post-meta -->
                    </div>
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
                </article>
                <!-- /article -->
              </div>
              <!-- /.item-inner -->
            </div>
            @endfor

 
          </div>
          <!--/.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
      </div>
      <!-- /.swiper-container -->
    </div>
    <!-- /.position-relative -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->