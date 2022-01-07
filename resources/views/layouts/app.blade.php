<!DOCTYPE html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AskHim - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{--    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">--}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                colors: {
                    transparent: 'transparent',
                    current: 'currentColor',
                    'white': '#ffffff',
                    'purple': '#3f3cbb',
                    'midnight': '#121063',
                    'metal': '#565584',
                    'tahiti': '#3ab7bf',
                    'silver': '#ecebff',
                    'bubble-gum': '#ff77e9',
                    'bermuda': '#78dcca',
                    'askHimBlue': '#2b6cf2',
                    'grey_clair': '#dedcdc',
                }
            },
            extend: {
                backgroundImage: {
                    'poigne': "url({{asset('assets/img/poinge.jpg')}})",
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>


@yield('navbar')

<div >
    @yield('content')
</div>


<script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>

<footer class="bg-gray-200">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
        <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
    </div>
</footer>
</body>
