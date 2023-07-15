@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{ __('Person'). ": ". __('Add')}}</div>
    <div class="car-body"> <!-- Sama ruta zahteva parametar $genre = 'genre'-->
        <form method="POST" action="{{route('people.update', ['people'=>$people ->id])}}">
            @method("PUT")
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">{{__('Name')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $people->name) }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                </div>
            </div>
            <div class="mb-3 row">
                <label for="surname" class="col-sm-2 col-form-label">{{__('Surname')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname', $people->surname) }}">
                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>

            <div class="mb-3 row">
                <label for="b_date" class="col-sm-2 col-form-label">{{__('Birth')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('b_date') is-invalid @enderror" id="b_date" name="b_date" value="{{ old('b_date', $people->b_date) }}">
                    @error('b_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>
            <div class="mb-3 row">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success">{{__('Save')}}</button>
                    <a href="{{ route('people.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection