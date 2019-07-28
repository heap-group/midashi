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

    <body class="bg-default">
            <main class="main-content">
                @include('common.public.public_navbar')
                @yield('contents')
            </main>
            @include('common.public.public_footer')
            @include('common.common_js')
            @yield('script')
    </body>
</html>
