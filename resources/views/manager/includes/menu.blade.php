<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            {{-- {{dd($modules)}} --}}

            @php
                // testes
                // dd($modules);
                // if ($modules = ["resource" => "threads.destroy"]) { // teste
                //     $modules = [
                //         ["resource" => "threads.index"],
                //     ];
                // }
                // $modules = null;
            @endphp

            @if ($modules != null)

                    @foreach ($modules as $m)

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{$m['name']}}</span>
                    </h6>

                    @foreach ($m['resources'] as $r)
                        <li class="nav-item">
                            {{-- {{dd($r)}} --}}
                            <a class="nav-link" href="{{route($r['resource'])}}">
                                <span data-feather="file"></span>
                                {{ $r['name'] }}
                            </a>
                        </li>
                    @endforeach
                @endforeach

                {{-- <li class="nav-item">
                    <a class="nav-link @if(request()->is('manager/users*')) active @endif" href="{{route('users.index')}}">
                        <span data-feather="file"></span>
                        Usuários
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link @if(request()->is('manager/roles*')) active @endif" href="{{route('roles.index')}}">
                        <span data-feather="home"></span>
                        Papéis <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('manager/resources*')) active @endif" href="{{route('resources.index')}}">
                        <span data-feather="file"></span>
                        Recursos
                    </a>
                </li> --}}

            @else

                <div class="col-12">
                    <h5>Acesso simples!</h5>
                </div>

            @endif

        </ul>
    </div>
</nav>
