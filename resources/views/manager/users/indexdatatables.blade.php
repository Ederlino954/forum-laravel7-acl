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

    <div class="card p-3 mb-5">

        <table class="table table-striped" id="usertable" >
            <thead >
                <tr>
                    <th> Nome </th>
                    <th>Papél </th>
                    <th>Ações </th>
                    <th>Criado em  </th>
                    <th>Permissões Associadas</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    @if (($user->role()->count() > 0) && ($user->role->role == "ROLE_ADMIN_GERAL"))

                    @else
                        <tr>
                            <td>
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
                                    {{-- <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo produto</button>
                                    </div> --}}

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

        {{-- Modal para permissões --}}

        {{-- <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" id="formProduto">
                        <div class="modal-header">
                            <h5 class="modal-title">Novo Produto</h5>
                        </div>
                        <div class="modal-body">

                            <input type="hidden" id="id" class="form-control">
                            <div class="form-group">
                                <label for="nomeProduto" class="control-label">Nome do Produto</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="precoProduto" class="control-label">Preço</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="precoProduto" placeholder="Preço do Produto">
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div> --}}

    </div>

@endsection

{{--
@section('javascript')

    <script type="text/javascript">

        function carregarProdutos() { // carregando produtos
            $.getJSON("/api/produtos", function (produtos) {
                    for (i=0; i<produtos.length ; i++) {
                        linha = montarLinha(produtos[i]);  // montando linha de produtos
                        $('#tabelaProdutos>tbody').append(linha);
                    }
                }
            );
        }

        $(function () {
            // carregarCategorias();
            carregarPermissoes();
        })

    </script>

@endsection
 --}}
