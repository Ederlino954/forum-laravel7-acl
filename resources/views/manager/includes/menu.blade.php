<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mb-auto mb-5 p-2 bd-highlight">
    <div class="sidebar-sticky  pt-3 mt-5 ">
        <ul class="nav flex-column mb-5 ">

            <div class="d-flex align-items-start flex-column bd-highlight mb-5" style="height: 200px;">

                @foreach (auth()->user()->role->resources()->where('is_menu', true)->get() as $resource)

                    <li class="nav-item">
                        <a class="nav-link @if(request()->is('manager/users*')) active @endif" href="#">
                            <span data-feather="file"></span>
                            {{ $resource->name }}
                        </a>
                    </li>

                @endforeach

            </div>
        </ul>

    </div>
</nav>
