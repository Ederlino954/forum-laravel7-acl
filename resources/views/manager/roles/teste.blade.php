@extends('layouts.manager')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 d-flex justify-content-between align-items-center">

            <div>
                {{-- {{dd($role1)}}
                {{-- @forelse($role1 as $rol)
                    <h2>Papéis de {{$rol->role_id}}</h2>
                    {{-- <a href="{{route('roles.create')}}" class="btn btn-success">Criar Papél</a> --}}
                {{-- @empty --}}

                {{-- @endforelse --}}
                <h5>Deseja realmente remover este papel? </h5>
                {{-- {{dd($id)}} --}}

                {{-- <form action="{{route('roles.destroy', $role->id)}}" method="post"> --}}
                    {{-- {{ $user->role->name }} --}}

                <form action="{{ route('destroy.connected', $id )}}" method="post" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">REMOVER PAPEL  E DESVINCULAR USUÁRIOS</button>
                </form>

            </div>

        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
            @forelse($role1 as $rol)
            {{-- {{dd($rol)}} --}}
                {{-- {{$rol->name}} --}}
                <tr>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-danger">{{$rol->name}}</button>
                            {{-- <form action="{{route('roles.destroy', $rol->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">{{$rol->name}}</button>
                            </form>
                            <a href="{{route('roles.resources', $rol->id)}}" class="btn btn-sm btn-dark"></a> --}}
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum papel cadastrado!</td>
                </tr>
            @endforelse

            {{-- @if (!$role1)
                @forelse ($role1 as $rol)

                <tr>
                    <td>{{$rol->id}}</td>

                </tr>

                @empty

                @endforelse
                @else --}}

            {{-- @endif --}}

            </tbody>
        </table>
        {{-- {{$roles->links()}} --}}
    </div>

@endsection
