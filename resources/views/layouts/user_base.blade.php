<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="@yield('description')">
        <title>@yield('title')</title>
        @include('common.common_css')
    </head>

    <body>
    <!-- Sidenav -->
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            @include('common.user.user_sidebar')
        </div>
        </div>
    </nav>
    <!-- Main content -->
    <main id="app" class="main-content">
        <!-- Header -->
        <div class="header bg-primary pb-8 pt-5 pt-md-3">
            <div class="container-fluid">
                @yield('header')
                {{-- @include('common.user.user_header') --}}
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                @yield('contents')
            </div>
            <!-- Footer -->
            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    @include('common.user.user_footer')
                </div>
            </footer>
        </div>
    </main>
    @include('common.common_js')
    @yield('script')
    </body>
</html>
