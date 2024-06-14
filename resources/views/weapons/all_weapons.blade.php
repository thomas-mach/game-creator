@extends('layouts.app')

@section('title')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="col-auto">
                    <h1>Weapons page</h1>
                    
                </div>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>type</th>
                        <th>category</th>
                        <th>weight</th>
                        <th>cost</th>
                        <th>damage_dice</th>
                    </tr>
                    </thead>
                    <tbody  class="table-group-divider table-hover table-striped">
                    @foreach ($items as $item)
                        <tr class="p-3">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->weight}}</td>
                            <td>{{$item->cost}}</td>
                            <td>{{$item->damage_dice}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection


{{-- @endsection

@foreach ($items as $item)
<h1>{{$item->name}}</h1>
<p>{{$item->type}}</p>
<p>{{$item->category}}</p>
<p>{{$item->weight}}</p>
<p>{{$item->cost}}</p>
<p>{{$item->damage_dice}}</p>

@endforeach --}}