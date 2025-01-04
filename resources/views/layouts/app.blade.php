<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <script src="{{ asset('js/RDZ.js') }}"></script>
    <script src="{{ asset('js/prismTN.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.rowReorder.js') }}"></script>
    <script src="{{ asset('js/rowReorder.dataTables.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/RDZ.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prismTN.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rowReorder.dataTables.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow sticky-top tab">
            <div class="container col-md-12">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ url('/Project') }}">Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ url('/About') }}">About</a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </nav>

        <main class="py-4 bg-white">
            @yield('content')
        </main>
    </div>
    <script>
       
    </script>
</body>

</html>
