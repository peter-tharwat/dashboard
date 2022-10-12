<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row">
      <div class="col-lg-11 col-xl-10 mx-auto mb-10">
        <h2 class="fs-16 text-uppercase text-muted text-center mb-3">سابقة أعمالنا</h2>
        <h3 class="display-3 text-center px-lg-5 px-xl-10 px-xxl-16 mb-0">إليكم مجموعة من الصور الخاصة باللوحة.</h3>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="grid grid-view projects-masonry">
      <div class="row gx-md-8 gy-10 gy-md-13 isotope">
        @for($i=1;$i<25;$i++)
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="/images/screenshots/.jpg" srcset="/images/screenshots/{{$i}}.jpg" alt="" /><a class="item-link" href="/images/screenshots/{{$i}}.jpg" data-fancybox="gallery"><i class="fal fa-search"></i></a></figure>
        </div>
        @endfor
      </div>
      <!-- /.row -->
    </div>
  </div>
  <!-- /.container -->
</section>