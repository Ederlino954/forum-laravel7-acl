<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">



            {{-- <div class=" m-2 d-flex">
                Lista com permissões:
            </div> --}}

            {{-- <li class="nav-item ">
                <span data-feather="file" class="m-2 d-flex">Lista de permissões:</span>
            </li> --}}


            @foreach($modules as $m)

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-1 mt-4 mb-1 text-muted">
                    <span>{{$m['name']}}</span>
                </h6>

                @foreach($m['resources'] as $r)
                    <div class="form-group ">
                        <div class=" form-control bg-ligth">
                            {{$r['name']}}
                        </div>
                    </div>
                @endforeach

            @endforeach


            {{-- @foreach($modules as $m)

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>{{$m['name']}}</span>
                </h6>

                @foreach($m['resources'] as $r)

                    @php
                        $slug = \App\Thread::all(['slug'])->first();
                        $slug["slug"];
                    @endphp

                    <li class="nav-item">
                        <a class="nav-link" href="{{route($r['resource'], $slug["slug"])}}">
                            <span data-feather="file"></span>
                            {{$r['name']}}
                        </a>
                    </li>

                @endforeach

            @endforeach --}}



            {{-- teste inicio =================================================================================================================  --}}

            {{-- {{dd($m["resources"][0]["resource"])}} --}}
                    {{-- {{dd($m["resources"][0]["id"])}} --}}

            {{-- {{\App\Thread::whereSlug(auth()->user()->id)->first()}} --}}

            {{-- {{auth()->user()->id}} --}}

            {{-- {{\App\Thread::all(['slug'])->first() }} --}}

            {{-- {{dd($modules)}} --}}
            {{-- {{dd($m['resources']['resource'])}} --}}
            {{-- {{dd($m["resources"])}} --}}
            {{-- {{dd($m['resources'] == 'threads.edit')}} --}}

            {{-- @if ($m["resources"][0]["resource"] == 'threads.update' ) --}}
                    {{--
                        @php
                            $slug = \App\Thread::all(['slug'])->first();
                            // dd($slug["slug"]);
                            $slug["slug"];

                            // dd($m["resources"][1]["resource"]);
                        @endphp --}}

                        {{-- {{dd($r['resource'])}}

                        <li class="nav-item">
                            <a class="nav-link" href="{{route($r['resource'], $slug["slug"] ) }}">
                                <span data-feather="file"></span>
                                {{$r['name']}}
                            </a>
                        </li> --}}

                        {{-- <a href="{{ route('routeName', ['id'=>1]) }}"></a> --}}

                    {{-- @endif --}}

                    {{-- {{auth()->user()->id}} --}}


            {{-- teste fim ========================================================================================================================= --}}


            {{-- @foreach($modules as $m)

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>{{$m['name']}}</span>
                </h6>

                @foreach($m['resources'] as $r)
                {{dd($r)}}
                {{ dd(auth()->user()) }}

                    <li class="nav-item">
                        <a class="nav-link" href="{{route($r['resource'])}}">
                            <span data-feather="file"></span>
                            {{$r['name']}}
                        </a>
                    </li>
                @endforeach
            @endforeach --}}

            <!--
            <li class="nav-item">
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
            </li>
            -->
        </ul>
    </div>
</nav>
