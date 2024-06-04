@extends('layouts.app')

@section('title', 'index')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="col-auto">
                    <h1>Characters</h1>
                    <a class="btn btn-info" href="{{ route('admin.characters.create') }}">Crea personaggio</a>
                </div>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>type_id</th>
                        <th>attack</th>
                        <th>defence</th>
                        <th>speed</th>
                        <th>life</th>
                    </tr>
                    </thead>
                    <tbody  class="table-group-divider table-hover table-striped">
                    @foreach ($characters as $character)
                        <tr class="p-3">
                            <td>{{$character->id}}</td>
                            <td>{{$character->name}}</td>
                            <td>{{$character->type_id}}</td>
                            <td>{{$character->attack}}</td>
                            <td>{{$character->defence}}</td>
                            <td>{{$character->speed}}</td>
                            <td>{{$character->life}}</td>
                            <td><a class="btn btn-primary" href="{{route('admin.characters.show', $character)}}">Details</a></td>
                            <td>

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
                                

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection