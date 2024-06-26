@extends('layouts.app')

@section('content')

    <main>
        <section>
            <div class="container">
                <h2 class="fs-2">Create Character</h2>
            </div>
            <div class="container">
                <form action="{{ route('admin.characters.store') }}" method="POST">
                    {{-- Cross Site Request Forgering --}}
                    @csrf
                    <div class="row">

                        <div class="col-6">

                            <div class="mb-3">
                                <label for="name" class="form-label"><strong>Name</strong></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="name"
                                    value="{{ old('name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label"><strong>Description</strong></label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"> {{ old('description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="type_id" class="form-label"><strong>Type</strong></label>
                                <input type="text" name="type_id" class="form-control" id="type_id" placeholder="type"
                                    value="{{ old('type_id') }}">
                            </div>


                            <div class="mb-3">
                                <label for="attack" class="form-label"><strong>Attack</strong></label>
                                <input type="number" name="attack" class="form-control" id="attack" placeholder=""
                                    value="{{ old('attack') }}">
                            </div>

                            <div class="mb-3">
                                <label for="defence" class="form-label"><strong>Defence</strong></label>
                                <input type="number" name="defence" class="form-control" id="defence" placeholder=""
                                    value="{{ old('defence') }}">
                            </div>

                        </div>

                        <div class="col-6">


                            <div class="mb-3">
                                <label for="speed" class="form-label"><strong>Speed</strong></label>
                                <input type="number" name="speed" class="form-control" id="speed" placeholder=""
                                    value="{{ old('speed') }}">
                            </div>

                            <div class="mb-3">
                                <label for="life" class="form-label"><strong>Life</strong></label>
                                <input type="number" name="life" class="form-control" id="life" placeholder=""
                                    value="{{ old('life') }}">
                            </div>
                            <h3>weapons</h3>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($weapons as $weapon)
                                    <div>
                                        <input @checked(in_array($weapon->id, old('weapons', []))) name="weapons[]" class="form-check-input"
                                            type="checkbox" value="{{ $weapon->id }}" id="weapon-{{ $weapon->id }}">
                                        <label class="form-check-label" for="weapon-{{ $weapon->id }}">
                                            {{ $weapon->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class=" mt-2 mb-2">
                            <button class="btn btn-primary">Create</button>
                            <a class="btn btn-secondary" href="{{ route('admin.characters.index') }}">Back</a>

                        </div>
                </form>


            </div>

            </div>
            </div>

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
