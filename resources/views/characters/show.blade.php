@extends('layouts.app')

@section('title', 'show')

@section('content')
<div class=" p-3">
    <a class="btn btn-warning" href="{{ route('admin.characters.index') }}">All Characters</a>
    <p><strong>ID:</strong> {{$character->id}}</p>
    <p><strong>NAME:</strong> {{$character->name}}</p>
    <p><strong>DESCRIPTION:</strong> {{$character->description}}</p>
    <p><strong>TYPE ID:</strong> {{$character->type_id}}</p>
    <p><strong>ATTACK:</strong> {{$character->attack}}</p>
    <p><strong>DEFENCE:</strong> {{$character->defence}}</p>
    <p><strong>SPEED:</strong> {{$character->speed}}</p>
    <p><strong>LIFE:</strong> {{$character->life}}</p>

    <strong>WEAPONS:</strong>
    <ul class="d-flex flex-wrap gap-2 list-unstyled">
        @foreach($character->items as $item)
        <li>/{{ $item->name }}/</li>
        @endforeach
    </ul>


    <div class="d-flex gap-3">
        <a class="btn btn-primary" href="{{route('admin.characters.edit', $character)}}">Edit</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Delete
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to delete {{ $character->name }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <form class="delete-character" action="{{ route('admin.characters.destroy',$character) }}" method="POST">


                            @method('DELETE')
                            @csrf

                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection