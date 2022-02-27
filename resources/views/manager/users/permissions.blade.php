@extends('layouts.manager')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 d-flex justify-content-between align-items-center">
            <h2>Permissões do Usuário {{$user->name}}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
                {{-- <div>
                    Nome: {{$user->name}}
                    {{-- {{dd($user1)}} --}}
                {{-- </div> --}}
                <hr>
                <div>
                    <button>{{ $user->role->name }}</button>
                    <hr>
                </div>
            <div class="row">
                @forelse ( $user1 as $resource )
                    <div class="col-md-4">
                        <button>{{$resource->name}}</button>
                    </div>
                @empty
                    <div>
                        <h5>Não existe permissões para este usuário!</h5>
                    </div>

                @endforelse
            </div>

            <hr>
                <a class="nav-link @if(request()->is('manager/roles*')) active @endif" href="{{route('roles.index')}}">

                    │ Alterar permissões <span class="sr-only">(current)</span>
                </a>
            <hr>

        </div>

    </div>

@endsection
