<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- @livewireStyles --}}
    <link rel="stylesheet" href="{{ asset('css/raw.css') }}">


    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.0.2/dist/font-face.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
</head>

<body class="font-sans antialiased " dir="rtl">
    <div class="min-h-screen bg-gray-100 ">
        @livewire('navigation-dropdown')


        <aside id="aside" class="sidebar bg-cool-gray-700">
            <div
                class="flex items-center flex-shrink-0 p-4 cursor-pointer close-icon text-cool-gray-500 hover:text-gray-400">
                <ion-icon onclick="sideTg()" name="close-outline" size="large"></ion-icon>
            </div>
            <h1 class="p-2 mx-2 text-2xl text-cool-gray-300">منو کاربری</h1>
            <div class="border-t border-gray-400 link-ul">
                <ul class="pt-2 text-blue-100 ">
                    <li class="border-b border-gray-600 hover:bg-cool-gray-600"><a href="/project" class="block w-full text-base"><ion-icon class="px-2" name="cube"></ion-icon>پروژه </a></li>
                    <li class="border-b border-gray-600 hover:bg-cool-gray-600"><a href="/blog" class="block w-full text-base"><ion-icon class="px-2" name="flag"></ion-icon>بلاگ</a></li>
                    <li class="border-b border-gray-600 hover:bg-cool-gray-600"><a href="/category" class="block w-full text-base"><ion-icon class="px-2" name="file-tray-stacked"></ion-icon>دسته بندی</a></li>
                    <li class="border-b border-gray-600 hover:bg-cool-gray-600"><a href="/groups" class="block w-full text-base"><ion-icon class="px-2" name="albums"></ion-icon>گروه</a></li>
                    <li class="border-b border-gray-600 hover:bg-cool-gray-600"><a href="/brands" class="block w-full text-base"><ion-icon class="px-2" name="logo-facebook"></ion-icon>برند</a></li>
                    <li class="border-b border-gray-600 hover:bg-cool-gray-600"><a href="/user" class="block w-full text-base"><ion-icon class="px-2" name="person"></ion-icon>کاربر</a></li>
                </ul>
            </div>

        </aside>
        <div class="overlay" onclick="sideTg()"></div>
        <!-- Page Heading -->


        <!-- Page Content -->
        <main >
            <header class="shadow bg-cool-gray-600 ">
                <div class="px-4 py-1 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{-- {{ $header }} --}}
                </div>
            </header>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="{{ asset('js/raw.js') }}"></script>

    {{-- @livewireScripts --}}
</body>

</html>
