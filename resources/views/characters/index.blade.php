@extends('layouts.app')

@section('title', 'index')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="col-auto">
                    <h1>page index</h1>
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
                            <td><a class="btn btn-primary" href="{{route('characters.show', $character)}}">Dettagli</a></td>
                            <td>
                                <form class="delete-character" action="{{ route('characters.destroy',$character) }}" method="POST">
                          
                                    {{-- <div class="d-none modal-delete ">
                                        <h5>Sei sicuro di voler eliminare?</h5>
                                        <button class="btn-yes">si</button>
                                        <button class="btn-no">no</button>
                                    </div> --}}

                                    @method('DELETE')
                                    @csrf
                    
                                    <button class="btn btn-danger">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection