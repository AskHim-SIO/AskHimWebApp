<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html class="" data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AskHim - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/datepicker.bundle.js"></script>
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

<style>
    html {
        scroll-behavior: smooth;
    }

    .container2{
        cursor: grab;
        overflow: auto;
    }

</style>

<body>
<span id="hautDePage"></span>

@yield('navbar')

<div class="relative">
    <a href="#hautDePage" class="animate-bounce">
        <svg id="btnUp" class="opacity-75 hover:animate-bounce  h-16 w-16 text-askHim-blue fixed right-10 bottom-10" width="24" height="24" viewBox="0 0 24 24"
             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z"/>
            <circle cx="12" cy="12" r="9"/>
            <line x1="12" y1="8" x2="8" y2="12"/>
            <line x1="12" y1="8" x2="12" y2="16"/>
            <line x1="16" y1="12" x2="12" y2="8"/>
        </svg>
    </a>
</div>

    @yield('content')
</div>

<!--SCRIPT JS-->
<script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>

<!--retour en haut de page -->
<script>
    document.getElementById("btnUp").style.display = "none";
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.getElementById("btnUp").style.display = "block";
        } else {
            document.getElementById("btnUp").style.display = "none";
        }
    }

    function retourHaut() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<footer class="bg-gray-200">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
        <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
    </div>
</footer>
</body>


