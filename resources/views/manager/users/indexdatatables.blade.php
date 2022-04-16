@extends('layouts.managerdatatables')

@php
    $enc = new App\Classes\Enc();
@endphp

@section('content')

    <div class="row">
        <div class="col-md-12 mt-3 d-flex justify-content-between align-items-center">
            <h2>Usuários do Sistema</h2>
        </div>
    </div>

    <div class="col-md-12">

        <table class="table table-striped" id="usertable" >
            <thead  class="border-primary">
                <tr>
                    <th class="border-primary "> Nome </th>
                    <th>Papél </th>
                    <th>Ações </th>
                    <th>Criado em  </th>
                    <th>Permissões Associadas</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    @if (($user->role()->count() > 0) && ($user->role->role == "ROLE_ADMIN_GERAL"))
                        <tr style="display: none">
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                        </tr>
                    @else
                        <tr>
                            <td class="border-primary">
                                    {{$user->name}}
                            </td>
                            <td>{{$user->role()->count() ? $user->role->name : 'Sem papél associado!'}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('users.edit', [$enc->encriptar($user->id)] )}}" class="btn btn-sm btn-primary">EDITAR</a>
                                </div>
                            </td>
                            <td>{{$user->created_at->format('d/m/Y H:i:s')}}</td>
                            <td>
                                @if ($user->role()->count())
                                    <div class="btn-group">
                                        <a href="{{route('associated.permissions', [$enc->encriptar($user->id)] )}}" class="btn btn-sm btn-outline-primary">PERMISSÕES</a>
                                    </div>
                                @else
                                    <div class="btn-group">
                                        <a href="{{route('associated.permissions', [$enc->encriptar($user->id)] )}}" class="btn btn-sm btn-secondary"> SEM PERMISSÕES</a>

                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif

                @empty
                    <td colspan="3">Nenhum usuário cadastrado!</td>
                @endforelse
            </tbody>
        </table>

    </div>

@endsection


