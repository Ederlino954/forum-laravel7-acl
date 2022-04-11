<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Gerenciador · Fórum</title>
    {{-- datatables --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"> --}}

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    {{-- datatables sem ajax, modo mais desmorado --}}



    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/"> --}}

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

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
    <ul class="navbar-nav px-1">

        <div class="d-flex justify-content-around">

            <a class="nav-link " href="{{route('threads.index')}}">
                <li class="nav-item m-2 btn btn-outline-success">
                    <span data-feather="file"></span>
                    Tópicos
                </li>
            </a>

            <a class="nav-link @if(request()->is('manager/users*')) bg-light active @endif" href="{{route('users.index')}}">
                <li class="nav-item m-2 btn btn-outline-success">
                    <span data-feather="file"></span>
                    Usuários
                </li>
            </a>

            <a class="nav-link @if(request()->is('manager/roles*')) bg-light active @endif" href="{{route('roles.index')}}">
                <li class="nav-item m-2 btn btn-outline-success">
                <span data-feather="home"></span>
                    Papéis <span class="sr-only">(current)</span>
                </li>
            </a>

            <a class="nav-link @if(request()->is('manager/resources*')) bg-light active @endif" href="{{route('resources.index')}}">
                <li class="nav-item m-2 btn btn-outline-success">
                    <span data-feather="file"></span>
                    Permissões
                </li>
            </a>

            {{-- <a class="nav-link @if(request()->is('manager/modules*')) active @endif" href="{{route('modules.index')}}">
                <li class="nav-item m-2 btn btn-outline-primary">
                    <span data-feather="file"></span>
                    Modulos
                </li>
            </a> --}}

            <a class="nav-link " href="#">
                <li class="nav-item m-2 btn btn-outline-success">
                    <span data-feather="file"></span>
                    <i><b><u>ADM: {{ Auth::user()->name }}</u></b></i>
                </li>
            </a>

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

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 ">
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
