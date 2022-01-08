@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Tópicos</h2>
            <hr>
        </div>
        <div class="col-12">
            @forelse ($threads as $thread )
                <div class="list-group">
                    <a href="{{ route('threads.show', $thread->slug) }}" class="list-group-item list-group-item-action">
                        <h5>{{$thread->title}}</h5>
                        <small>criado em{{$thread->created_at->diffForHumans()}}</small>
                    </a>
                </div>
            @empty

                <div class="alert alert-warning">
                    Nenhum tópico encontrado!
                </div>

            @endforelse
            
            {{-- exemplo de bloco oculto --}}
            {{-- <div style="display: none">
                {{$threads->links()}}
            </div> --}}

            {{$threads->links()}}
        </div>
    </div>


@endsection
