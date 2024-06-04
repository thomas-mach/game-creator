@extends('layouts.app')

@section('content')

<main>
  <section>
    <div class="container">
        <h2 class="fs-2">Edit character</h2>
    </div>
    <div class="container">
        <form  action="{{ route('admin.characters.update', $character) }}" method="POST">
            {{-- Cross Site Request Forgering --}}
            @csrf 
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name personaggio" value="{{old('name',$character->name)}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrizione">{{old('description', $character->description)}}</textarea>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <input type="text" name="type_id" class="form-control" id="type_id" placeholder="type" value="{{old('type_id',$character->type_id)}}">
            </div>

            
            <div class="mb-3">
                <label for="attack" class="form-label">Attack</label>
                <input type="number" name="attack" class="form-control" id="attack" placeholder="" value="{{old('attack',$character->attack)}}">
            </div>
            
            <div class="mb-3">
                <label for="defence" class="form-label">Defence</label>
                <input type="number" name="defence" class="form-control" id="defence" placeholder="" value="{{old('defence',$character->defence)}}">
            </div>

            <div class="mb-3">
                <label for="speed" class="form-label">Speed</label>
                <input type="number" name="speed" class="form-control" id="speed" placeholder="" value="{{old('speed',$character->speed)}}">
            </div>

            <div class="mb-3">
                <label for="life" class="form-label">Life</label>
                <input type="number" name="life" class="form-control" id="life" placeholder="" value="{{old('life',$character->life)}}">
            </div>

            <button class="btn btn-primary">Edit</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
  </section>
</main>

@endsection