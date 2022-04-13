@extends('layouts.manager')

@php
    $enc = new App\Classes\Enc();
@endphp

@section('content')

    <div class="row">
        <div class="col-md-12 mt-4 d-flex justify-content-between align-items-center">
            <h2>Usuários do Sistema</h2>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <form class="d-flex" action="" method="GET">
                <input class="form-control me-2" type="search" placeholder="Pesquisa" aria-label="Search" id="search" name="search" >
                <button class="btn btn-outline-primary col-md-4" type="submit">Pesquisar por nome</button>
            </form>

            @if ($search)
                <div class="border border-dark m-3">
                    <h3 class=" text-dark m-2" > Pesquisando por: <u><b><i>{{ $search }}</i></b></u> </h3>
                </div>
            @else
                <hr>
            @endif
        </div>

        <table id="usertable" class="table table-striped " >
            <thead>
                <tr>
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
                                @if ($user->role()->count())
                                    <div class="btn-group">
                                        <a href="{{route('associated.permissions', [$enc->encriptar($user->id)] )}}" class="btn btn-sm btn-outline-primary">PERMISSÕES</a>
                                        {{-- <a href="{{route('associated.permissions', ['id' =>$enc->encriptar($user->id) ])}}" class="btn btn-sm btn-primary">PERMISSÕES</a> --}}
                                    </div>
                                @else
                                    <div class="btn-group">
                                        <a href="{{route('associated.permissions', [$enc->encriptar($user->id)] )}}" class="btn btn-sm btn-secondary"> SEM PERMISSÕES</a>
                                        {{-- <a href="{{route('associated.permissions', ['id' =>$enc->encriptar($user->id) ])}}" class="btn btn-sm btn-primary">PERMISSÕES</a> --}}
                                    </div>
                                @endif
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

        @if (!$search)
            {{$users->links()}}
        @endif

    </div>

@endsection


