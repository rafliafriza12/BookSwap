<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <title>Book Swap | @yield('title')</title>
</head>

<body
    class=" bg-[#121212] font-poppins w-screen overflow-x-hidden h-screen px-5 py-5 flex flex-col items-center gap-5 scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar-thin scrollbar-thumb-[#b3b3b3]">
    <div class="w-full relative">
        @include('components.header')
        @include('components.sidebar')
        @include('components.listchat')
    </div>
    @yield('body')
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
