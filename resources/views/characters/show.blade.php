@extends('layouts.app')

@section('title', 'show')

@section('content')
    <div class="container">
        <div class=" p-3 ">
            <a class="btn btn-warning mb-3" href="{{ route('admin.characters.index') }}">Your Characters</a>

            <p class="border-bottom"><strong>ID:</strong> {{ $character->id }}</p>
            <p class="border-bottom"><strong>NAME:</strong> {{ $character->name }}</p>
            <p class="border-bottom"><strong>DESCRIPTION:</strong> {{ $character->description }}</p>
            <p class="border-bottom"><strong>TYPE ID:</strong> {{ $character->type_id }}</p>
            <p class="border-bottom"><strong>ATTACK:</strong> {{ $character->attack }}</p>
            <p class="border-bottom"><strong>DEFENCE:</strong> {{ $character->defence }}</p>
            <p class="border-bottom"><strong>SPEED:</strong> {{ $character->speed }}</p>
            <p class="border-bottom"><strong>LIFE:</strong> {{ $character->life }}</p>

            <strong>WEAPONS:</strong>
            <ul class="d-flex flex-wrap gap-2 list-unstyled border-bottom p-2">
                @foreach ($character->items as $item)
                    <li class="badge rounded-pill text-bg-success p-2">{{ $item->name }}</li>
                @endforeach
            </ul>

           @if($character->user_id === Auth::id())
            <div class="d-flex gap-3">
                <a class="btn btn-primary" href="{{ route('admin.characters.edit', $character) }}">Edit</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                </button>

              
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Do you really want to delete {{ $character->name }}?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <form class="delete-character" action="{{ route('admin.characters.destroy', $character) }}"
                                    method="POST">


                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
