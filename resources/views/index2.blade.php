@extends('layouts.app')
@section('content')
<style type="text/css">
*:not(.fileuploader):not([class^="fileuploader-icon-"]):not([class^="fa"]):not(.cairo):not([class^="vj"]):not([class^="tie-"]) {
    font-family: 'DinNext',sans-serif!important;
    /*direction: rtl;*/
}
.navbar-light .navbar-nav .nav-link {
    color: rgba(0,0,0,1);
}
.navbar-dark .navbar-nav .nav-link {
    color: rgba(255,255,255,1);
}
</style>
  <div class="content-wrapper">
    <header class="wrapper bg-soft-primary">
      <nav class="navbar navbar-expand-lg center-nav transparent position-absolute navbar-dark caret-none">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
            <a href="/index.html">
              <img class="logo-dark" src="/images/alpha-v-dark.png" srcset="/assets/img/logo-dark@2x.png 2x" alt="" style="width: 130px;" />
              <img class="logo-light" src="/images/alpha-v-light.png" srcset="/assets/img/logo-light@2x.png 2x" alt="" style="width: 130px;" />
            </a>
          </div>
          <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
              <h3 class="text-white fs-30 mb-0">Sandbox</h3>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
              <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link" href="#" >الرئيسية</a>
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link" href="#" >معلومات عنا</a>
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link" href="#" >خدماتنا</a>
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link" href="#" >الصور</a>
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link" href="#" >تواصل معنا</a>
                </li>
               {{--  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
                  <ul class="dropdown-menu">
                    <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a class="dropdown-item" href="/services.html">Services I</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/services2.html">Services II</a></li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">About</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a class="dropdown-item" href="/about.html">About I</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/about2.html">About II</a></li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Shop</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a class="dropdown-item" href="/shop.html">Shop I</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/shop2.html">Shop II</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/shop-product.html">Product Page</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/shop-cart.html">Shopping Cart</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/shop-checkout.html">Checkout</a></li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Contact</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a class="dropdown-item" href="/contact.html">Contact I</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/contact2.html">Contact II</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/contact3.html">Contact III</a></li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Career</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a class="dropdown-item" href="/career.html">Job Listing I</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/career2.html">Job Listing II</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/career-job.html">Job Description</a></li>
                      </ul>
                    </li>
                    <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Utility</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a class="dropdown-item" href="/404.html">404 Not Found</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/page-loader.html">Page Loader</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/signin.html">Sign In I</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/signin2.html">Sign In II</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/signup.html">Sign Up I</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/signup2.html">Sign Up II</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/terms.html">Terms</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a class="dropdown-item" href="/pricing.html">Pricing</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="/onepage.html">One Page</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Projects</a>
                  <div class="dropdown-menu dropdown-lg">
                    <div class="dropdown-lg-content">
                      <div>
                        <h6 class="dropdown-header">Project Pages</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="/projects.html">Projects I</a></li>
                          <li><a class="dropdown-item" href="/projects2.html">Projects II</a></li>
                          <li><a class="dropdown-item" href="/projects3.html">Projects III</a></li>
                          <li><a class="dropdown-item" href="/projects4.html">Projects IV</a></li>
                        </ul>
                      </div>
                      <!-- /.column -->
                      <div>
                        <h6 class="dropdown-header">Single Projects</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="/single-project.html">Single Project I</a></li>
                          <li><a class="dropdown-item" href="/single-project2.html">Single Project II</a></li>
                          <li><a class="dropdown-item" href="/single-project3.html">Single Project III</a></li>
                          <li><a class="dropdown-item" href="/single-project4.html">Single Project IV</a></li>
                        </ul>
                      </div>
                      <!-- /.column -->
                    </div>
                    <!-- /auto-column -->
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="dropdown-item" href="/blog.html">Blog without Sidebar</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="/blog2.html">Blog with Sidebar</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="/blog3.html">Blog with Left Sidebar</a></li>
                    <li class="dropdown dropdown-submenu dropend"><a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog Posts</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a class="dropdown-item" href="/blog-post.html">Post without Sidebar</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/blog-post2.html">Post with Sidebar</a></li>
                        <li class="nav-item"><a class="dropdown-item" href="/blog-post3.html">Post with Left Sidebar</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Blocks</a>
                  <ul class="dropdown-menu mega-menu mega-menu-dark mega-menu-img">
                    <li class="mega-menu-content">
                      <ul class="row row-cols-1 row-cols-lg-6 gx-0 gx-lg-6 gy-lg-4 list-unstyled">
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/about.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block1.svg" alt=""></div>
                            <span>About</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/blog.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block2.svg" alt=""></div>
                            <span>Blog</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/call-to-action.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block3.svg" alt=""></div>
                            <span>Call to Action</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/clients.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block4.svg" alt=""></div>
                            <span>Clients</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/contact.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block5.svg" alt=""></div>
                            <span>Contact</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/facts.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block6.svg" alt=""></div>
                            <span>Facts</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/faq.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block7.svg" alt=""></div>
                            <span>FAQ</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/features.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block8.svg" alt=""></div>
                            <span>Features</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/footer.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block9.svg" alt=""></div>
                            <span>Footer</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/hero.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block10.svg" alt=""></div>
                            <span>Hero</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/misc.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block17.svg" alt=""></div>
                            <span>Misc</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/navbar.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block11.svg" alt=""></div>
                            <span>Navbar</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/portfolio.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block12.svg" alt=""></div>
                            <span>Portfolio</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/pricing.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block13.svg" alt=""></div>
                            <span>Pricing</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/process.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block14.svg" alt=""></div>
                            <span>Process</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/team.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block15.svg" alt=""></div>
                            <span>Team</span>
                          </a>
                        </li>
                        <li class="col"><a class="dropdown-item" href="/docs/blocks/testimonials.html">
                            <div class="rounded img-svg d-none d-lg-block p-4 mb-lg-2"><img class="rounded-0" src="/assets/img/demos/block16.svg" alt=""></div>
                            <span>Testimonials</span>
                          </a>
                        </li>
                      </ul>
                      <!--/.row -->
                    </li>
                    <!--/.mega-menu-content-->
                  </ul>
                  <!--/.dropdown-menu -->
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Documentation</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="mega-menu-content">
                      <div class="row gx-0 gx-lg-3">
                        <div class="col-lg-4">
                          <h6 class="dropdown-header">Usage</h6>
                          <ul class="list-unstyled cc-2 pb-lg-1">
                            <li><a class="dropdown-item" href="/docs/index.html">Get Started</a></li>
                            <li><a class="dropdown-item" href="/docs/forms.html">Forms</a></li>
                            <li><a class="dropdown-item" href="/docs/faq.html">FAQ</a></li>
                            <li><a class="dropdown-item" href="/docs/changelog.html">Changelog</a></li>
                            <li><a class="dropdown-item" href="/docs/credits.html">Credits</a></li>
                          </ul>
                          <h6 class="dropdown-header mt-lg-6">Styleguide</h6>
                          <ul class="list-unstyled cc-2">
                            <li><a class="dropdown-item" href="/docs/styleguide/colors.html">Colors</a></li>
                            <li><a class="dropdown-item" href="/docs/styleguide/fonts.html">Fonts</a></li>
                            <li><a class="dropdown-item" href="/docs/styleguide/icons-svg.html">SVG Icons</a></li>
                            <li><a class="dropdown-item" href="/docs/styleguide/icons-font.html">Font Icons</a></li>
                            <li><a class="dropdown-item" href="/docs/styleguide/illustrations.html">Illustrations</a></li>
                            <li><a class="dropdown-item" href="/docs/styleguide/backgrounds.html">Backgrounds</a></li>
                            <li><a class="dropdown-item" href="/docs/styleguide/misc.html">Misc</a></li>
                          </ul>
                        </div>
                        <!--/column -->
                        <div class="col-lg-8">
                          <h6 class="dropdown-header">Elements</h6>
                          <ul class="list-unstyled cc-3">
                            <li><a class="dropdown-item" href="/docs/elements/accordion.html">Accordion</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/alerts.html">Alerts</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/animations.html">Animations</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/avatars.html">Avatars</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/background.html">Background</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/badges.html">Badges</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/buttons.html">Buttons</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/card.html">Card</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/carousel.html">Carousel</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/dividers.html">Dividers</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/form-elements.html">Form Elements</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/image-hover.html">Image Hover</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/image-mask.html">Image Mask</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/lightbox.html">Lightbox</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/player.html">Media Player</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/modal.html">Modal</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/pagination.html">Pagination</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/progressbar.html">Progressbar</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/shadows.html">Shadows</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/shapes.html">Shapes</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/tables.html">Tables</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/tabs.html">Tabs</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/text-animations.html">Text Animations</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/text-highlight.html">Text Highlight</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/tiles.html">Tiles</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/tooltips-popovers.html">Tooltips & Popovers</a></li>
                            <li><a class="dropdown-item" href="/docs/elements/typography.html">Typography</a></li>
                          </ul>
                        </div>
                        <!--/column -->
                      </div>
                      <!--/.row -->
                    </li>
                    <!--/.mega-menu-content-->
                  </ul>
                  <!--/.dropdown-menu -->
                </li> --}}
              </ul>
              <!-- /.navbar-nav -->
              {{-- <div class="offcanvas-footer d-lg-none">
                <div>
                  <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                  <br /> 00 (123) 456 78 90 <br />
                  <nav class="nav social social-white mt-4">
                    <a href="#"><i class="uil uil-twitter"></i></a>
                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                    <a href="#"><i class="uil uil-dribbble"></i></a>
                    <a href="#"><i class="uil uil-instagram"></i></a>
                    <a href="#"><i class="uil uil-youtube"></i></a>
                  </nav>
                </div>
              </div> --}}
              <!-- /.offcanvas-footer -->
            </div>
            <!-- /.offcanvas-body -->
          </div>
          <!-- /.navbar-collapse -->
          <div class="navbar-other w-100 d-flex ms-auto">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item"><a class="nav-link" >English</a></li>


            </ul>
            <!-- /.navbar-nav -->
          </div>
          <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
      <div class="offcanvas offcanvas-end text-inverse" id="offcanvas-info" data-bs-scroll="true">
        <div class="offcanvas-header">
          <h3 class="text-white fs-30 mb-0">Sandbox</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pb-6">
          <div class="widget mb-8">
            <p>Sandbox is a multipurpose HTML5 template with various layouts which will be a great solution for your business.</p>
          </div>
          <!-- /.widget -->
          <div class="widget mb-8">
            <h4 class="widget-title text-white mb-3">Contact Info</h4>
            <address> Moonshine St. 14/05 <br /> Light City, London </address>
            <a href="mailto:first.last@email.com">info@email.com</a><br /> 00 (123) 456 78 90
          </div>
          <!-- /.widget -->
          <div class="widget mb-8">
            <h4 class="widget-title text-white mb-3">Learn More</h4>
            <ul class="list-unstyled">
              <li><a href="#">Our Story</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <!-- /.widget -->
          <div class="widget">
            <h4 class="widget-title text-white mb-3">Follow Us</h4>
            <nav class="nav social social-white">
              <a href="#"><i class="uil uil-twitter"></i></a>
              <a href="#"><i class="uil uil-facebook-f"></i></a>
              <a href="#"><i class="uil uil-dribbble"></i></a>
              <a href="#"><i class="uil uil-instagram"></i></a>
              <a href="#"><i class="uil uil-youtube"></i></a>
            </nav>
            <!-- /.social -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /.offcanvas-body -->
      </div>
      <!-- /.offcanvas -->
      <div class="offcanvas offcanvas-top bg-light" id="offcanvas-search" data-bs-scroll="true">
        <div class="container d-flex flex-row py-6">
          <form class="search-form w-100">
            <input id="search-form" type="text" class="form-control" placeholder="Type keyword and hit enter">
          </form>
          <!-- /.search-form -->
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- /.container -->
      </div>
      <!-- /.offcanvas -->
    </header>
    <!-- /header -->
    <section class="wrapper ">
      <div class="swiper-container swiper-thumbs-container swiper-fullscreen nav-dark" data-margin="0" data-autoplay="true" data-autoplaytime="7000" data-nav="true" data-dots="false" data-items="1" data-thumbs="true" style="border-radius:0px 0px 0px 0px;overflow: hidden;">
        <div class="swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" data-image-src="http://alphaco.com.sa/img/bg-default1.jpg"></div>
            <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" data-image-src="http://alphaco.com.sa/img/bg-default1.jpg"></div>
            <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" data-image-src="http://alphaco.com.sa/img/bg-default1.jpg"></div>
            <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image" data-image-src="http://alphaco.com.sa/img/bg-default1.jpg"></div>
          </div>
          <!--/.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
        <div class="swiper swiper-thumbs" style="opacity:0">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="http://alphaco.com.sa/img/bg-default1.jpg" srcset="/assets/img/photos/bg28-th@2x.jpg 2x" alt="" /></div>
            <div class="swiper-slide"><img src="http://alphaco.com.sa/img/bg-default1.jpg" srcset="/assets/img/photos/bg29-th@2x.jpg 2x" alt="" /></div>
            <div class="swiper-slide"><img src="http://alphaco.com.sa/img/bg-default1.jpg" srcset="/assets/img/photos/bg30-th@2x.jpg 2x" alt="" /></div>
            <div class="swiper-slide"><img src="http://alphaco.com.sa/img/bg-default1.jpg" srcset="/assets/img/photos/bg31-th@2x.jpg 2x" alt="" /></div>
          </div>
        </div>
        <!-- /.swiper -->
        <div class="swiper-static">
          <div class="container h-100 d-flex align-items-center justify-content-center">
            <div class="row">
              <div class="col-lg-12 mx-auto mt-n10 text-center">
                
                <h2 class="display-1 fs-60 text-white mb-5 animate__animated animate__zoomIn animate__delay-1s font-lg-10" >ألفا للمؤتمرات والمعارض</h2>
                <h1 class="fs-19 text-uppercase ls-xl text-white mb-0 animate__animated animate__zoomIn animate__delay-2s ">شركة وطنية بسمات عالمية بهوية عربية وبروح وثابة مبهرة</h1>
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container -->
        </div>
        <!-- /.swiper-static -->
      </div>
      <!-- /.swiper-container -->
    </section>


    <section class="wrapper bg-light">
  <div class="container py-14 py-md-16 text-center">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <h2 class="fs-15 text-uppercase text-muted mb-3 text-center">ماذا نقدم ؟</h2>
        <h3 class="display-4 mb-10 px-xl-10 text-center">قائمة الخدمات التي نقدمها لكم.</h3>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="position-relative">
      <div class="shape rounded-circle bg-soft-blue rellax w-16 h-16" data-rellax-speed="1" style="bottom: -0.5rem; right: -2.2rem; z-index: 0;"></div>
      <div class="shape bg-dot yellow rellax w-16 h-17" data-rellax-speed="1" style="top: -0.5rem; left: -2.5rem; z-index: 0;"></div>
      <div class="row gx-md-5 gy-5 text-center">
        <div class="col-md-6 col-xl-3">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <img src="./assets/img/icons/lineal/search-2.svg" class="svg-inject icon-svg icon-svg-md text-yellow mb-3" alt="" />
              <h4 class="text-center">تنظيم الفعاليات</h4>
              <p class="mb-2">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النصوص في أدوات منصة نفذلي، حيث يمكنك أن تولد مثل.</p>
            </div>
            <!--/.card-body text-center -->
          </div>
          <!--/.card -->
        </div>
        <!--/column -->
        <div class="col-md-6 col-xl-3">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <img src="./assets/img/icons/lineal/browser.svg" class="svg-inject icon-svg icon-svg-md text-red mb-3" alt="" />
              <h4 class="text-center">تنظيم الفعاليات</h4>
              <p class="mb-2">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النصوص في أدوات منصة نفذلي، حيث يمكنك أن تولد مثل.</p>
            </div>
            <!--/.card-body text-center -->
          </div>
          <!--/.card -->
        </div>
        <!--/column -->
        <div class="col-md-6 col-xl-3">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <img src="./assets/img/icons/lineal/chat-2.svg" class="svg-inject icon-svg icon-svg-md text-green mb-3" alt="" />
              <h4 class="text-center">تنظيم الفعاليات</h4>
              <p class="mb-2">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النصوص في أدوات منصة نفذلي، حيث يمكنك أن تولد مثل.</p>
            </div>
            <!--/.card-body text-center -->
          </div>
          <!--/.card -->
        </div>
        <!--/column -->
        <div class="col-md-6 col-xl-3">
          <div class="card shadow-lg">
            <div class="card-body text-center">
              <img src="./assets/img/icons/lineal/megaphone.svg" class="svg-inject icon-svg icon-svg-md text-blue mb-3" alt="" />
              <h4 class="text-center">تنظيم الفعاليات</h4>
              <p class="mb-2">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النصوص في أدوات منصة نفذلي، حيث يمكنك أن تولد مثل.</p>
            </div>
            <!--/.card-body text-center -->
          </div>
          <!--/.card -->
        </div>
        <!--/column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.position-relative -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->




<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row">
      <div class="col-lg-11 col-xl-10 mx-auto mb-10">
        <h2 class="fs-16 text-uppercase text-muted text-center mb-3">سابقة أعمالنا</h2>
        <h3 class="display-3 text-center px-lg-5 px-xl-10 px-xxl-16 mb-0">إليكم مجموعة من سابقة الأعمال الخاصة بنا.</h3>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="grid grid-view projects-masonry">
      <div class="row gx-md-8 gy-10 gy-md-13 isotope">
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd7.jpg" srcset="./assets/img/photos/pd7@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd7-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd8.jpg" srcset="./assets/img/photos/pd8@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd8-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd9.jpg" srcset="./assets/img/photos/pd9@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd9-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd10.jpg" srcset="./assets/img/photos/pd10@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd10-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd11.jpg" srcset="./assets/img/photos/pd11@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd11-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd12.jpg" srcset="./assets/img/photos/pd12@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd12-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd7.jpg" srcset="./assets/img/photos/pd7@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd7-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd8.jpg" srcset="./assets/img/photos/pd8@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd8-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd9.jpg" srcset="./assets/img/photos/pd9@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd9-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd10.jpg" srcset="./assets/img/photos/pd10@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd10-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd11.jpg" srcset="./assets/img/photos/pd11@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd11-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
        <div class="project item col-md-6 col-xl-4 col-xxl-3 mt-2">
          <figure class="rounded mb-6"><img src="./assets/img/photos/pd12.jpg" srcset="./assets/img/photos/pd12@2x.jpg 2x" alt="" /><a class="item-link" href="./assets/img/photos/pd12-full.jpg" data-glightbox data-gallery="projects-group"><i class="fal fa-search"></i></a></figure>
        </div>
      </div>
      <!-- /.row -->
    </div>
  </div>
  <!-- /.container -->
</section>
<!-- /section -->





<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
      <div class="col-lg-6 position-relative order-lg-2">
        <div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1" style="top: 3rem; left: 5.5rem"></div>
        <div class="overlap-grid overlap-grid-2">
          <div class="item">
            <figure class="rounded shadow"><img src="./assets/img/photos/about2.jpg" srcset="./assets/img/photos/about2@2x.jpg 2x" alt=""></figure>
          </div>
          <div class="item">
            <figure class="rounded shadow"><img src="./assets/img/photos/about3.jpg" srcset="./assets/img/photos/about3@2x.jpg 2x" alt=""></figure>
          </div>
        </div>
      </div>
      <!--/column -->
      <div class="col-lg-6">
        
        <h2 class="display-4 mb-3"><img src="./assets/img/icons/lineal/megaphone.svg" class="svg-inject icon-svg icon-svg-md mb-4" alt="" /> من نحن؟</h2>
        <p class="lead fs-lg">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النصوص في أدوات منصة نفذلي</p>
        <p class="mb-6">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النصوص في أدوات منصة نفذلي، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة.</p>
        <div class="row gy-3 gx-xl-8">
          <div class="col-xl-6">
          	<ul style="list-style:none" class="p-0">
          		<li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
          	</ul>
          </div>
          <div class="col-xl-6">
          	<ul style="list-style:none" class="p-0">
          		<li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
                <li>
          			<i class="fas fa-check-circle mx-2 p-2" style="color:#7cb798"></i>
          			<span>اسم الميزة سيتم كتابته هنا</span>
                </li>
          	</ul>
          </div> 
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!--/column -->
    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->



<section class="wrapper image-wrapper bg-auto no-overlay bg-image text-center bg-map" data-image-src="./assets/img/map.png">
  <div class="container py-14 pt-md-16 pb-md-18">
    <div class="row pt-md-12">
      <div class="col-lg-10 col-xl-9 col-xxl-8 mx-auto">
        <h2 class="fs-15 text-uppercase text-muted mb-3 text-center">مرحباً بك في مجتمعنا</h2>
        <h3 class="display-4 mb-8 px-lg-12 text-center">تعرف على ألفا في أرقام.</h3>
      </div>
      <!-- /.row -->
    </div>
    <!-- /column -->
    <div class="row pb-md-12">
      <div class="col-md-10 col-lg-9 col-xl-7 mx-auto">
        <div class="row align-items-center counter-wrapper gy-4 gy-md-0">
          <div class="col-md-4 text-center">
            <h3 class="counter counter-lg text-primary text-center">+80</h3>
            <p class="text-center">حدث تم انجازه</p>
          </div>
          <!--/column -->
          <div class="col-md-4 text-center">
            <h3 class="counter counter-lg text-primary text-center">100%</h3>
            <p class="text-center">نسبة نجاح</p>
          </div>
          <!--/column -->
          <div class="col-md-4 text-center">
            <h3 class="counter counter-lg text-primary text-center">+50</h3>
            <p class="text-center">منظم خبير</p>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->



<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row mb-3">
      <div class="col-md-10 col-lg-12 col-xl-10 col-xxl-9 mx-auto text-center">
        <h2 class="fs-15 text-uppercase text-muted mb-3 text-center">فريقنا</h2>
        <h3 class="display-4 mb-7 px-lg-19 px-xl-18 text-center">تعرف علينا عن قرب.</h3>
      </div>
      <!--/column -->
    </div>
    <!--/.row -->
    <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0">
      <div class="col-md-6 col-lg-3">
        <div class="position-relative">
          <div class="shape rounded bg-soft-blue rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
          <div class="card">
            <figure class="card-img-top"><img class="img-fluid" src="./assets/img/avatars/t1.jpg" srcset="./assets/img/avatars/t1@2x.jpg 2x" alt="" /></figure>
            <div class="card-body px-6 py-5">
              <h4 class="mb-1">أحمد السبيعي</h4>
              <p class="mb-0">رئيس مجلس الإدارة</p>
            </div>
            <!--/.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /div -->
      </div>
      <!--/column -->
      <div class="col-md-6 col-lg-3">
        <div class="position-relative">
          <div class="shape rounded bg-soft-red rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
          <div class="card">
            <figure class="card-img-top"><img class="img-fluid" src="./assets/img/avatars/t2.jpg" srcset="./assets/img/avatars/t2@2x.jpg 2x" alt="" /></figure>
            <div class="card-body px-6 py-5">
              <h4 class="mb-1">شيماء الحاج</h4>
              <p class="mb-0">نائب الرئيس</p>
            </div>
            <!--/.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /div -->
      </div>
      <!--/column -->
      <div class="col-md-6 col-lg-3">
        <div class="position-relative">
          <div class="shape rounded bg-soft-green rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
          <div class="card">
            <figure class="card-img-top"><img class="img-fluid" src="./assets/img/avatars/t3.jpg" srcset="./assets/img/avatars/t3@2x.jpg 2x" alt="" /></figure>
            <div class="card-body px-6 py-5">
              <h4 class="mb-1">فيصل عثمان</h4>
              <p class="mb-0">المدير المالي</p>
            </div>
            <!--/.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /div -->
      </div>
      <!--/column -->
      <div class="col-md-6 col-lg-3">
        <div class="position-relative">
          <div class="shape rounded bg-soft-violet rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
          <div class="card">
            <figure class="card-img-top"><img class="img-fluid" src="./assets/img/avatars/t4.jpg" srcset="./assets/img/avatars/t4@2x.jpg 2x" alt="" /></figure>
            <div class="card-body px-6 py-5">
              <h4 class="mb-1">هندام جمال الدين</h4>
              <p class="mb-0">مديرة العلاقات العامة</p>
            </div>
            <!--/.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /div -->
      </div>
      <!--/column -->
    </div>
    <!--/.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->






<section class="wrapper bg-light pb-16">
  <div class="container py-14 py-md-16">
    <div class="row">
      <div class="col-xl-10 mx-auto">
        <div class="card">
          <div class="row gx-0">
            <div class="col-lg-6 align-self-stretch">
              <div class="map map-full rounded-top rounded-lg-start">
              	<img src="/images/map.png" style="width: 100%;height: 100%;">
              	{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25387.23478654725!2d-122.06115399490332!3d37.309248660190086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb4571bd377ab%3A0x394d3fe1a3e178b4!2sCupertino%2C%20CA%2C%20USA!5e0!3m2!1sen!2str!4v1645437305701!5m2!1sen!2str" style="width:100%; height: 100%; border:0" allowfullscreen=""></iframe> --}}
              </div>
              <!-- /.map -->
            </div>
            <!--/column -->
            <div class="col-lg-6">
              <div class="p-10 p-md-11 p-lg-14">
                <div class="d-flex flex-row">
                  <div>
                    <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="fal fa-map-marker-alt"></i> </div>
                  </div>
                  <div class="align-self-start justify-content-start">
                    <h5 class="mb-1">العنوان</h5>
                    <address>السعودية - الرياض - 13 شارع الروضة</address>
                  </div>
                </div>
                <!--/div -->
                <div class="d-flex flex-row">
                  <div>
                    <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="fal fa-phone"></i> </div>
                  </div>
                  <div>
                    <h5 class="mb-1">الجوال</h5>
                    <p>966550123456 <br class="d-none d-md-block" />966550123456</p>
                  </div>
                </div>
                <!--/div -->
                <div class="d-flex flex-row">
                  <div>
                    <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="fal fa-envelope-open"></i> </div>
                  </div>
                  <div>
                    <h5 class="mb-1">البريد</h5>
                    <p class="mb-0"><a href="mailto:sandbox@email.com" class="link-body">info@alpha.com</a></p>
                    <p class="mb-0"><a href="mailto:help@sandbox.com" class="link-body">support@alpha.com</a></p>
                  </div>
                </div>
                <!--/div -->
              </div>
              <!--/div -->
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->



<footer class="bg-soft-primary pt-5">
  <div class="container">
    <div class="row">
      <div class="col-xl-11 col-xxl-10 mx-auto">
        <div class="card image-wrapper bg-full bg-image bg-overlay bg-overlay-400 mt-n50p mb-n5" data-image-src="./assets/img/photos/bg3.jpg">
          <div class="card-body p-6 p-md-11 d-lg-flex flex-row align-items-lg-center justify-content-md-between text-center text-lg-start">
            <h3 class="display-6 mb-6 mb-lg-0 pe-lg-15 pe-xxl-18 text-white">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النصوص.</h3>
            <a href="#" class="btn btn-white rounded-pill mb-0 text-nowrap">تواصل معنا</a>
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
              <h4 class="widget-title">العنوان</h4>
              <address>13 شارع الروضة <br class="d-none d-md-block" /> الرياض - السعودية</address>
            </div>
            <!-- /.widget -->
          </div>
          <!--/column -->
          <div class="col-md-4">
            <div class="widget">
              <h4 class="widget-title">الجوال</h4>
              <p>9665569845551 <br />9665569845551</p>
            </div>
            <!-- /.widget -->
          </div>
          <!--/column -->
          <div class="col-md-4">
            <div class="widget">
              <h4 class="widget-title">البريد الإلكتروني</h4>
              <p><a href="mailto:sandbox@email.com" class="link-body">info@email.com</a> <br class="d-none d-md-block" /><a href="mailto:help@sandbox.com" class="link-body">help@alpha.com</a></p>
            </div>
            <!-- /.widget -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <p class="text-center">© 2022 ألفا. جميع الحقوق محفوظة.</p>
        <nav class="nav social justify-content-center">
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-dribbble"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </nav>
        <!-- /.social -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</footer>


 
 
@endsection