@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Tópicos</h2>
            <hr>
        </div>
        <div class="col-12">

            <form class="d-flex" action="" method="GET">
                <input class="form-control me-2 border-primary " type="search" placeholder="Pesquisa" aria-label="Search" id="search" name="search" value="{{old('search')}}">
                <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
            </form>

            @if ($search)
                <div class="border">
                    <h3 class=" text-dark m-2" > Pesquisando por: <u><b><i>{{ $search }}</i></b></u> </h3>
                </div>
            @else
                <hr>
            @endif

            @forelse($threads as $thread)
            {{-- ----------------- --}}
                <div class="list-group ">
                    <a href="{{route('threads.show', $thread->slug)}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">

                        <div class="" >
                            <h5>{{$thread->title}}</h5>
                            <small>Criado em {{$thread->created_at->diffForHumans()}} por  <u><b><i> {{$thread->user->name}} </i></b></u>  </small>
                            <span class="badge badge-primary">{{$thread->channel->slug}}</span>
                        </div>

                        <div class="btn btn-outline-primary">
                            <span class="badge badge-warning badge-pill">{{$thread->replies->count()}}</span>
                        </div>

                    </a>
                </div>
            {{-- ----------------- --}}

            @empty

                @if ($search == 0)
                    <div class="alert alert-danger ">
                        <p>Nenhum tópico encontrado com a pesquisa <u><b>{{ $search }}</b></u>! <a href="{{route('threads.index')}}"> ver todos os Tópicos </a> </p>
                    </div>
                @else
                    <div class="alert alert-warning">
                        Nenhum tópico encontrado!
                    </div>
                @endif

            @endforelse

            @if (!$search)
                {{$threads->links()}}
            @endif

        </div>
    </div>
@endsection
