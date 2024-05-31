@extends('layouts.app')

@section('title', 'show')

@section('content')
    <div class=" p-3">
        <p><strong>ID:</strong> {{$character->id}}</p>
        <p><strong>NOME:</strong> {{$character->name}}</p>
        <p><strong>DESCRIZIONE:</strong> {{$character->description}}</p>
        <p><strong>TYPE ID:</strong> {{$character->type_id}}</p>
        <p><strong>ATTACCO:</strong> {{$character->attack}}</p>
        <p><strong>DIFESA:</strong> {{$character->defence}}</p>
        <p><strong>VELOCITA`:</strong> {{$character->speed}}</p>
        <p><strong>VITA:</strong> {{$character->life}}</p>
        <div class="d-flex gap-3">
            <a class="btn btn-primary" href="{{route('characters.edit', $character)}}">Modifica</a>
            <form action="{{ route('characters.destroy',$character) }}" method="POST">
                          
                @method('DELETE')
                @csrf

                <button class="btn btn-danger">Elimina</button>
            </form>
        </div>
    </div>

@endsection