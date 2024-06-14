@extends('layouts.app')

@section('content')

    <main>
        <section>
            <div class="container">
                <h2 class="fs-2 py-2">Edit Character</h2>
            </div>
            <div class="container">
                <form action="{{ route('admin.characters.update', $character) }}" method="POST">
                    {{-- Cross Site Request Forgering --}}
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-6">


                            <div class="mb-3">
                                <label for="name" class="form-label"><strong>Name</strong></label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="name personaggio" value="{{ old('name', $character->name) }}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label"><strong>Description</strong></label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrizione">{{ old('description', $character->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="type_id" class="form-label"><strong>Type</strong></label>
                                <input type="text" name="type_id" class="form-control" id="type_id" placeholder="type"
                                    value="{{ old('type_id', $character->type_id) }}">
                            </div>


                            <div class="mb-3">
                                <label for="attack" class="form-label"><strong>Attack</strong></label>
                                <input type="number" name="attack" class="form-control" id="attack" placeholder=""
                                    value="{{ old('attack', $character->attack) }}">
                            </div>

                            <div class="mb-3">
                                <label for="defence" class="form-label"><strong>Defence</strong></label>
                                <input type="number" name="defence" class="form-control" id="defence" placeholder=""
                                    value="{{ old('defence', $character->defence) }}">
                            </div>

                        </div>

                        <div class="col-6">

                            <div class="mb-3">
                                <label for="speed" class="form-label"><strong>Speed</strong></label>
                                <input type="number" name="speed" class="form-control" id="speed" placeholder=""
                                    value="{{ old('speed', $character->speed) }}">
                            </div>

                            <div class="mb-3">
                                <label for="life" class="form-label"><strong>Life</strong></label>
                                <input type="number" name="life" class="form-control" id="life" placeholder=""
                                    value="{{ old('life', $character->life) }}">
                            </div>

                            <div class="py-2"><strong>Weapons</strong></div>
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach ($weapons as $weapon)
                                    <div class="form-check ">
                                        <input @checked(in_array($weapon->id, old('weapons', $character->items->pluck('id')->all()))) name="weapons[]" class="form-check-input"
                                            type="checkbox" value="{{ $weapon->id }}" id="weapon-{{ $weapon->id }}">
                                        <label class="form-check-label" for="weapon-{{ $weapon->id }}">
                                            {{ $weapon->name }}
                                        </label>
                                    </div>
                                    @endforeach
                            </div>
                           
                        </div>

                        <button class="btn btn-primary w-25 m-4">Edit</button>
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
            </div>

            </div>
        </section>
    </main>

@endsection
