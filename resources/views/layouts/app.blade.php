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
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.min.css" />
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
            }
        }
    </script>
</head>
<body>


    @yield('navbar')

<div class="container">
    @yield('content')
</div>


    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
</body>
