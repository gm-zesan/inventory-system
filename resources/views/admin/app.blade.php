<!DOCTYPE html>
<html lang="en">

<head>
    <title>Steadfast IT || @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta data -->
    <meta name="author" content="UQIF" />
    <meta name="description" content="@yield('seo_description')" />
    <meta name="Resource-type" content="@yield('seo_resource_type')" />
    <meta name="keywords" content="@yield('seo_keywords')">
    <link rel="image_src" href="@yield('seo_image')" />

    @include('admin.includes.favicon')
    @include('admin.includes.styles')
    @stack('custom-style')

    <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
         <link rel='stylesheet' href="css/ie/ie8.css">
     <![endif]-->

</head>

<body style="overflow-x: hidden">
    <div id="main-wrapper">
        @include('admin.includes.sidebar')
        <div class="content scrollbar" id="fullpage" style="background-color: #f0f1f7;">
            @include('admin.includes.header')
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>


    @include('admin.includes.scripts')

    @stack('custom-scripts')

</body>

</html>
