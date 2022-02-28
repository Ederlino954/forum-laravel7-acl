@extends('layouts.manager')

@php
    $enc = new App\Classes\Enc();
@endphp

@section('content')
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> --}}
    <div class="row">
        <div class="col-md-12 mt-4 d-flex justify-content-between align-items-center">
            <h2>Usuários Sistema</h2>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped " id="usertable">
            <thead>
                <tr>
                    {{-- <th> # <br> ______ </th> --}}
                    <th> Nome <br> ______ </th>
                    <th>Papél <br> ______</th>
                    <th>Criado Em <br> ______</th>
                    <th>Ações <br> ______ </th>
                    <th>Permissões <br> Associadas</th>
                </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <?php if($user->name == "ROLE_ADMIN_GERAL"): ?>
                    <tr>

                    </tr>
                <?php else: ?>
                    <tr>

                        @php

                        @endphp

                        {{-- {{dd($enc->encriptar($user->id))}} --}}
                        {{-- <td>{{$enc->encriptar($user->id)}}</td> --}}
                        {{-- <td>{{['id_usuario' =>$enc->encriptar($user->id) ]}}</td> --}}
                        <td>{{$user->name}}</td>
                        <td>{{$user->role()->count() ? $user->role->name : 'Sem papél associado!'}}</td>
                        <td>{{$user->created_at->format('d/m/Y H:i:s')}}</td>
                        <td>
                            <div class="btn-group">
                                {{-- <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-primary">EDITAR</a> --}}
                                <a href="{{route('users.edit', [$enc->encriptar($user->id)] )}}" class="btn btn-sm btn-primary">EDITAR</a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('associated.permissions', [$enc->encriptar($user->id)] )}}" class="btn btn-sm btn-primary">PERMISSÕES</a>
                                {{-- <a href="{{route('associated.permissions', ['id' =>$enc->encriptar($user->id) ])}}" class="btn btn-sm btn-primary">PERMISSÕES</a> --}}
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            @empty
                <tr>
                    <td colspan="3">Nenhum usuário cadastrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{$users->links()}}
    </div>

    {{-- datatables --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
    {{-- <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script>
        $(document).ready( function () {
            $('#usertable').DataTable();
        } );
    </script> --}}

@endsection
