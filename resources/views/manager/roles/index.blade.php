@extends('layouts.managerdatatables')

@php
    $enc = new App\Classes\Enc();
@endphp

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4 d-flex justify-content-between align-items-center">
            <h2>Papéis de Usuário</h2>
            <a href="{{route('roles.create')}}" class="btn btn-success">Criar Papél</a>
        </div>
        {{-- {{dd($roles)}} --}}
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    {{-- <th>#</th> --}}
                    <th>Nome</th>
                    <th>Criado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @forelse($roles as $role)
            {{-- {{dd($role->name)}} --}}
                <?php if($role->name == "ROLE_ADMIN_GERAL"): ?>
                    <tr>
                    </tr>
                <?php else: ?>
                    <tr>
                        {{-- {{dd([$enc->encriptar($role->id)])}} --}}
                        {{-- <td>{{$role->id}}</td> --}}
                        <td>{{$role->name}}: <span class="badge badge-danger">{{$role->role}}</span></td>
                        <td>{{$role->created_at->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('roles.edit', [$enc->encriptar($role->id)] )}}" class="btn btn-sm btn-primary">EDITAR</a>
                                {{-- <a href="{{route('roles.edit', $role->id )}}" class="btn btn-sm btn-primary">EDITAR</a> --}}
                                {{-- <form action="{{route('roles.destroy', $role->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">REMOVER</button>
                                </form> --}}
                                <form action="{{route('roles.destroy', [$enc->encriptar($role->id)] )}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Deseja realmente remover este Papel?')"  class="btn btn-sm btn-danger">REMOVER</button>
                                </form>

                                <a href="{{route('roles.resources', $role->id)}}" class="btn btn-sm btn-dark">Marcar/Desmarcar Permissões</a>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            @empty
                <tr>
                    <td colspan="3">Nenhum papel cadastrado!</td>
                </tr>
            @endforelse

            </tbody>
        </table>
        {{$roles->links()}}
    </div>

@endsection
