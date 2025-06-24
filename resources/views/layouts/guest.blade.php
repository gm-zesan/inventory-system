<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Steadfast IT</title>

        <!-- Favicons -->
        <link href="{{asset('images/favicon/favicon.png')}}" rel="icon">
        <link href="{{asset('images/favicon/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        <style>
            .login-form{
                padding: 30px
            }
            .sign-in{
                color: rgb(51, 51, 53);
                font-size: 20px;
                font-weight: 600;
                line-height: 24px;
                text-align: center;
                margin-bottom: 8px;
            }
            .welcome{
                color: rgb(140, 144, 151);
                font-size: 13px;
                font-weight: 400;
                line-height: 19px;
                text-align: center;
                margin-bottom: 24px;
            }
            .forgot-password{
                color: rgb(230, 83, 60);
                font-size: 12.8px;
                font-weight: 600;
                line-height: 19px;
            }
            .no-account{
                display: block;
                text-align: center;
                color: rgb(140, 144, 151);
                font-size: 12px;
                font-weight: 400;
                line-height: 18px;
                margin: 16px 0;
            }
            .login-btn{
                width: 100%;
                display: inline-block;
                font-size: 15px;
                font-weight: 500;
                line-height: 22px;
                background-color: #f3f6f8;
                color: #333335;
                border: none;
                padding: 10px 0;
                transition: all 0.3s ease-in-out;
            }
            .login-btn:hover{
                background-color: #e4ecf2;
                color: #333335;
            }
            .login-btn:active{
                background-color: #e4ecf2;
                color: #333335;
            }
            .login-btn:focus{
                box-shadow: none;
                outline: none;
            }
            .label-auth{
                color: rgb(51, 51, 53);
                font-size: 12.8px;
                font-weight: 600;
                line-height: 19px;
                /* margin-bottom: 8px; */
            }
            .input-auth:focus{
                box-shadow: none;
                outline: none;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <h2>Steadfast IT</h2>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-5 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>