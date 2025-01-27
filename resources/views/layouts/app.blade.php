<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/icon/favicon.png') }}" type="image/gif" sizes="16x16">
    <title style="font-size: 20px">{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> -->
    <script src="{{ asset('js/RDZ.js') }}"></script>
    <script src="{{ asset('js/prismTN.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.rowReorder.js') }}"></script>
    <script src="{{ asset('js/rowReorder.dataTables.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Rdz.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prismTN.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rowReorder.dataTables.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow sticky-top tab">
            <div class="container col-md-12">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-*" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex w-100">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/Project') }}">Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/About') }}">About</a>
                        </li>
                        <li class="nav-item p-1 ml-auto">
                            <a class="nav-link pointer" id="theme">Dark Mode</a>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
        </nav>

        <main class="py-4 RDZMain">
            @yield('content')
        </main>
    </div>
    <script>
       
        document.addEventListener('DOMContentLoaded', function () {
        const htmlElement = document.documentElement;
        const themeToggle = document.getElementById('theme');

        // Cek tema tersimpan di localStorage
        const savedTheme = localStorage.getItem('theme') || 'dark';
        htmlElement.setAttribute('data-bs-theme', savedTheme);
        themeToggle.textContent = savedTheme === 'dark' ? 'Dark Mode' : 'Light Mode';

        // Event klik untuk toggle tema
        themeToggle.addEventListener('click', function () {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            this.textContent = newTheme === 'dark' ? 'Dark Mode' : 'Light Mode';
        });
    });
    </script>
</body>

</html>
