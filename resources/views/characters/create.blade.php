@extends('layouts.app')

@section('content')

<main>
  <section>
    <div class="container">
        <h2 class="fs-2">Crea Personaggio</h2>
    </div>
    <div class="container">
        <form  action="{{ route('characters.store') }}" method="POST">
            {{-- Cross Site Request Forgering --}}
            @csrf 

            <div class="mb-3">
                <label for="name" class="form-label">nome</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name personaggio">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrizione"></textarea>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <input type="text" name="type_id" class="form-control" id="type_id" placeholder="type">
            </div>

            
            <div class="mb-3">
                <label for="attack" class="form-label">Attacco</label>
                <input type="number" name="attack" class="form-control" id="attack" placeholder="">
            </div>
            
            <div class="mb-3">
                <label for="defence" class="form-label">difesa</label>
                <input type="number" name="defence" class="form-control" id="defence" placeholder="">
            </div>

            <div class="mb-3">
                <label for="speed" class="form-label">velocità</label>
                <input type="number" name="speed" class="form-control" id="speed" placeholder="">
            </div>

            <div class="mb-3">
                <label for="life" class="form-label">vita</label>
                <input type="number" name="life" class="form-control" id="life" placeholder="">
            </div>

            <button class="btn btn-primary">Crea</button>
        </form>

        @if ($errors->any())
          <div class="alert alert-danger">
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