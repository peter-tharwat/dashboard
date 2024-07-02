<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="light-style layout-navbar-fixed layout-menu-fixed " 
    dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}" 
    data-theme="theme-default"
    data-assets-path="{{ asset('dashboard') }}/" data-template="vertical-menu-template-starter">
<head>
  <meta charset="utf-8" />
    @php
        $page_title = __('lang.dashboard');
    @endphp
    @include('seo.index')
    @livewireStyles
    @yield('styles')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/img/favicon/favicon.ico') }}" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
<style>
    *, html, body {
        font-family: 'Cairo', sans-serif;
    
    }
</style>

  <link rel="stylesheet" href="{{ asset('dashboard') }}/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="{{ asset('dashboard') }}/vendor/fonts/flag-icons.css" />
  <!-- Page CSS -->  
  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{ asset('dashboard/vendor/fonts/tabler-icons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('dashboard') }}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('dashboard') }}/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('dashboard') }}/vendor/libs/node-waves/node-waves.css" />
  <link rel="stylesheet" href="{{ asset('dashboard') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="{{ asset('dashboard') }}/vendor/libs/typeahead-js/typeahead.css" />
  <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}" />

  <!-- Helpers -->
  <script src="{{ asset('dashboard') }}/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="{{ asset('dashboard') }}/vendor/js/template-customizer.js"></script>
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('dashboard') }}/js/config.js"></script>

</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <x-admin.sidebar />
            <div class="layout-page">
                <x-admin.navbar />
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                </div>
            </div>




{{-- 
            <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">@csrf</form>
            <div class="layout-page">
                <x-admin.sidebar />
                <div class="layout-page">
                    <x-admin.navbar />
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                           <div class="row">
                            <div class="col-12">

                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('dashboard') }}/vendor/libs/jquery/jquery.js"></script>
  <script src="{{ asset('dashboard') }}/vendor/libs/popper/popper.js"></script>
  <script src="{{ asset('dashboard') }}/vendor/js/bootstrap.js"></script>
  <script src="{{ asset('dashboard') }}/vendor/libs/node-waves/node-waves.js"></script>
  <script src="{{ asset('dashboard') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="{{ asset('dashboard') }}/vendor/libs/hammer/hammer.js"></script>
  <script src="{{ asset('dashboard') }}/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Main JS -->
  <script src="{{ asset('dashboard') }}/js/main.js"></script>
  @livewireScripts
  @include('layouts.scripts')
  @yield('scripts')
  @stack('scripts')

</body>

</html>



{{-- <!DOCTYPE html>
<html dark="{{ $settings['dashboard_dark_mode'] == '1' ? 'true' : 'false' }}" lang="ar">

<head>
<body style="background: #eef4f5" class="dash">
    @yield('after-body')
    
    <div class="col-12 d-flex">
        <x-admin.sidebar />
        <div class="main-content in-active" style="overflow: hidden;">
            <x-admin.navbar />
            <div class="col-12 px-0  " style="margin-top: 55px;position: relative;">
                <div style="position:fixed;display: flex;align-items: center;justify-content: center;height: 100vh;background: var(--background-1);z-index: 10;margin-top: -15px;"
                    id="loading-image-container">
                    <img src="/images/loading.gif" style="position:fixed;width: 120px;max-width: 80%;margin-top: -60px;"
                        id="loading-image">
                </div>

                @yield('content')
            </div>
        </div>
    </div>
    @vite('resources/js/dashboard.js')
</body>
</html>
 --}}