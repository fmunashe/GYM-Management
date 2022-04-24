<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Dashboard | WarmFit</title>
    @include('layouts.header')
</head>
<body class="loading"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="wrapper">
    <div class="leftside-menu">
        @include('layouts.logo_section')
        <div class="h-100" id="leftside-menu-container" data-simplebar>
            @include('layouts.sidemenu')
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="content-page">
        <div class="content">
            @include('layouts.top_nav')
            <div class="container-fluid">
                @include('layouts.adverts_section')
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
</div>
@include('layouts.settings')

@include('layouts.javascripts')

@yield('javascripts')

@include('sweetalert::alert')
@livewireScripts
</body>
</html>
