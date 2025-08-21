<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobBridge</title>
    <link rel="stylesheet" href="{{ url('CSS/style.css') }}">
       @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.adminnav')

    <!-- -------------- navbar close-------- -->

    <div class="container">
        @yield('content')
