@extends('layouts.app')

@section('title', 'index')

@section('content')
<main>
    <section>
     
        <div class="container">
            <div class="col-auto d-flex justify-content-between py-3">
                <h1>Characters</h1>
                <div class="align-self-center">
                    <a class="btn btn-warning " href="{{ route('admin.characters.create') }}">Create character</a>
                </div>

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
                <tbody class="table-group-divider table-hover table-striped">
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

                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection