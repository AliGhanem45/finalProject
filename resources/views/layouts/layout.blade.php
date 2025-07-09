<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Website Design - Easy Tutorials</title>
    <link rel="stylesheet" href="{{ url('CSS/style.css') }}">
</head>
<body>

@include('layouts.nav')

<!-- -------------- navbar close-------- -->

<div class="container">
    @yield('content')