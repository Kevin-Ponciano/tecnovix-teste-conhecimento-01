<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registro Livros.com</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Tabler CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/tabler.min.css')}}">
    <!-- DataTable CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head>
<body class="antialiased">
<script src="{{asset('assets/js/theme.js')}}"></script>
<div class="page">
    <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <div class="fw-bolder text-center w-8">
                        Registro Livros.com
                    </div>
                    <div class="navbar-nav flex-row order-md-last">
                        <div class="d-none d-md-flex">
                            <a onclick="setTheme('dark')" class="nav-link px-0 hide-theme-dark cursor-pointer"
                               data-bs-toggle="tooltip"
                               data-bs-placement="bottom" aria-label="Enable dark mode"
                               data-bs-original-title="Enable dark mode">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                                </svg>
                            </a>
                            <a onclick="setTheme('light')" class="nav-link px-0 hide-theme-light cursor-pointer"
                               data-bs-toggle="tooltip"
                               data-bs-placement="bottom" aria-label="Enable light mode"
                               data-bs-original-title="Enable light mode">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path
                                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                       viewBox="0 0 24 24"
                                       stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                       stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path
                                          d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path
                                          d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path
                                          d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                                </span>
                                <span class="nav-link-title">
                                    Cadastrar
                            </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                       viewBox="0 0 24 24"
                                       stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                       stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path
                                          d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path
                                          d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path
                                          d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                                </span>
                                <span class="nav-link-title">
                                    Livros Cadastrados
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    @if(session('success'))
        <div class="alert alert-dismissible alert-success bg-body-tertiary fade mb-0 mt-3 show text-center"
             role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="page-wrapper">
        {{$slot}}
    </div>
</div>

<!-- Tabler Core -->
<script src="{{asset('assets/js/tabler.min.js')}}"></script>
<!-- viaCep -->
<script src="{{asset('assets/js/viaCep.js')}}"></script>
<!-- Data Tables JS -->
<script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        let table = new DataTable('#table', {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json"
            },
            dom: 'f',
            pageLength: 100,
        });

        let url = window.location
        let item = $('li.nav-item a[href="' + url + '"]')

        if (item.attr('class') === 'dropdown-item') {
            item.addClass('active')
            item.parent().parent().parent().parent().addClass('active')
        } else {
            item.parent().addClass('active')
        }
    });
</script>
</body>
</html>
