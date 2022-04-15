<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Gerenciador · Fórum</title>

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}


    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/"> --}}



    <!-- Bootstrap core CSS -->
    {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}

        {{-- Início datatables teste  --}}
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

             <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> --}}

            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

             <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
             <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">



        {{-- Fim datatables teste  --}}


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
    {{-- <link href="{{asset('css/dashboard.css')}}" rel="stylesheet"> --}}
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

            {{-- dataTableAbstract datatables teste  --}}
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready( function () {
                    $('#usertable').DataTable();
                } );
            </script>


        </main>
    </div>
</div>

</body>
</html>
