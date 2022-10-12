<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row mb-3">
      <div class="col-md-10 col-xl-9 col-xxl-7 mx-auto text-center">
        <h2 class="display-4 mb-3 px-lg-14 text-center">اللوحة في صور .</h2>
      </div>
    </div>
    <div class="position-relative">
      <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1" style="bottom: 0.5rem; right: -1.7rem;"></div>
      <div class="shape rounded-circle bg-line red rellax w-16 h-16" data-rellax-speed="1" style="top: 0.5rem; left: -1.7rem;"></div>
      <div class="swiper-container dots-closer mb-6" data-margin="0" data-dots="true" data-items-xxl="2" data-items-lg="1" data-items-md="1" data-items-xs="1">
        <div class="swiper">
          <div class="swiper-wrapper">


            @for($i=1;$i<25;$i++)
            <div class="swiper-slide">
              <div class="item-inner">
                <div class="card p-0">
                  <div class="card-body p-0">
                    <img class="p-2" src="/images/screenshots/{{$i}}.jpg" alt="" data-fancybox="gallery" />
                  </div>
                </div>
              </div>
            </div>
            @endfor


     
          </div>
        </div>
      </div>
    </div>
  </div>
</section>