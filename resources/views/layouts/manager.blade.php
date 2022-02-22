<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Gerenciador · Fórum</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Gerenciador Fórum</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">

        <div class="d-flex justify-content-around">
            <li class="nav-item m-3">
                <i><b><u><a href="{{route('threads.index')}}" class="nav-link">│ Tópicos │ </a></u></b></i>
            </li>
            <li class="nav-item m-3">
                <a class="nav-link @if(request()->is('manager/users*')) active @endif" href="{{route('users.index')}}">
                    <span data-feather="file"></span>
                    │ Usuários
                </a>
            </li>
            <li class="nav-item m-3">
                <a class="nav-link @if(request()->is('manager/roles*')) active @endif" href="{{route('roles.index')}}">
                    <span data-feather="home"></span>
                    │ Papéis <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item m-3">
                <a class="nav-link @if(request()->is('manager/resources*')) active @endif" href="{{route('resources.index')}}">
                    <span data-feather="file"></span>
                    │ Recursos
                </a>
            </li>
            <li class="nav-item m-3">
                <a class="nav-link @if(request()->is('manager/modules*')) active @endif" href="{{route('modules.index')}}">
                    <span data-feather="file"></span>
                    │ Modulos
                </a>
            </li>
            <li class="nav-item m-3">
                <a class="nav-link " href="#">
                    <span data-feather="file"></span>
                    <i><b><u>│ ADM: {{ Auth::user()->name }} │</u></b></i>
                </a>
            </li>

        </div>

    </ul>
    <ul class="navbar-nav px-3">

        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Logout</a>
            <form action="{{route('logout')}}" method="post" class="logout" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">

        @include('manager.includes.menu')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="mt-4">
                @include('flash::message')
            </div>
            @yield('content')
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>
