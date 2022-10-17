<nav class="navbar navbar-expand-lg center-logo transparent navbar-light py-1 border-bottom shadow" style="background: #fff;border-color: #f7f7f7!important;">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
  <div class="container flex-lg-row flex-nowrap align-items-center">
    <div class="navbar-brand">
      <a href="/">
        <img src="{{$settings->website_wide_logo()}}" style="width: 140px;" srcset="./assets/img/logo@2x.png 2x" alt="" />
      </a>
    </div>
    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-end navbar-light">
      <div class="offcanvas-header d-lg-none">
        <a href="/"><img src="{{$settings->website_wide_logo()}}"  style="width: 140px;" srcset="./assets/img/logo-light@2x.png 2x" alt="" /></a>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body  d-flex flex-column h-100">
        <ul class="navbar-nav">
          @php
          $menu = \App\Models\Menu::where('location',"NAVBAR")->with(['links'=>function($q){$q->orderBy('order','ASC');}])->first();
          @endphp

          @if($menu !=null)
            @foreach($menu->links as $link)
            <li class="nav-item"><a class="nav-link" href="{{$link->url}}"><span class="{{$link->icon}} font-1" style="color: #0194fe;width: 15px"></span> {{$link->title}}</a></li>
            @endforeach
          @endif
      
        </ul> 
      </div>
    </div>
    <div class="navbar-other ms-lg-4">
      <ul class="navbar-nav flex-row align-items-center ms-auto">


 

        @auth
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
          <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><img src="{{auth()->user()->getUserAvatar()}}" style="width:30px;border-radius: 50%" /><span class="px-2">{{auth()->user()->name}}</span></a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a class="dropdown-item" href="/admin">لوحة التحكم</a></li>
              <li class="nav-item"><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">تسجيل خروج</a></li>
            </ul>
          </li>
          @endauth
        @guest
        <li class="nav-item d-none d-md-block">
          <a href="{{route('login')}}" class="btn btn-sm btn-primary rounded-pill pb-2" style="line-height:1">تسجيل دخول</a>
        </li>
        @endguest
        <li class="nav-item d-lg-none ms-0 me-3">
          <button class="hamburger offcanvas-nav-btn"><span></span></button>
        </li>
      </ul>
      <!-- /.navbar-nav -->
    </div>
    <!-- /.navbar-other -->
  </div>
  <!-- /.container -->
</nav>
