<!DOCTYPE html>
<html dark="{{ $settings['dashboard_dark_mode'] == '1' ? 'true' : 'false' }}" lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/dashboard.css')
    @php
        $page_title = __('lang.dashboard');
    @endphp
    @include('seo.index')
    @livewireStyles
    @yield('styles')
</head>
<body style="background: #eef4f5" class="dash">
    @yield('after-body')
    <div class="col-12 justify-content-end d-flex">
        @if ($errors->any())
            <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
                {!! implode(
                    '',
                    $errors->all(
                        '<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>',
                    ),
                ) !!}
            </div>
        @endif
    </div>
    <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">@csrf</form>
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
    @livewireScripts
    @include('layouts.scripts')
    @yield('scripts')
    @stack('scripts')
</body>
</html>
