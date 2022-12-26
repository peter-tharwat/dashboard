<section class="wrapper bg-light">
  <style type="text/css">
    .swiper-navigation{
      direction: ltr;
    }
    
  </style>
  <div class="overflow-hidden">
    <div class="container py-14 py-md-16">
      <div class="row">
        <div class="col-xl-7 col-xxl-6 mx-auto text-center">
          <i class="fal fa-pen-alt font-5"></i>
          <h2 class="display-4 text-center mt-2 mb-10">إليك أحدث مقالاتنا</h2>
        </div>
        <!--/column -->
      </div>


 

      <!--/.row -->
      <div class="swiper-container nav-bottom nav-color mb-14" data-margin="30" data-dots="false" data-nav="true" data-items-lg="3" data-items-md="2" data-items-xs="1">
        <div class="swiper overflow-visible pb-2">
          <div class="swiper-wrapper">
            @for($i=0;$i<10;$i++)
            <div class="swiper-slide">
              <article>
                <div class="card shadow-lg">
                  <figure class="card-img-top overlay overlay-1"><a href="#"> <img src="/assets/img/photos/7.jpg" alt="" /></a>
                    <figcaption>
                      <h5 class="from-top mb-0 text-center">عرض المزيد</h5>
                    </figcaption>
                  </figure>
                  <div class="card-body p-6">
                    <div class="post-header">
                      <div class="post-category">
                        <a href="#" class="hover" rel="category">ريادة الأعمال</a>
                      </div>
                      <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="./blog-post.html">هذا النص هو مثال لنص يمكن أن يستبدل</a></h2>
                    </div>
                    <div class="post-footer">
                      <ul class="post-meta d-flex mb-0">
                        <li class="post-date"> <span>14 Apr 2022</span> <i class="fal fa-clock"></i> </li>
                        <li class="post-comments"><a href="#">  4 <i class="fal fa-comment"></i> </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            @endfor
          </div>
        </div>
      </div>
    </div>
  </div>
</section>