@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{ __('Genre'). ": ". __('Add')}}</div>
    <div class="car-body"> <!-- Sama ruta zahteva parametar $genre = 'genre'-->
        <form method="POST" action="{{route('genre.update', ['genre'=>$genre ->id])}}">
            @method("PUT")
            @csrf
            <div class="mb-3 row">
                <label for="name_en" class="col-sm-2 col-form-label">{{__('Name EN')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en', $genre->name_en) }}"><!--$genre->name_en se ubacuje prvi put kad dodjemo mi nemamo session za jezik -->
                    @error('name_en')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                </div>
            </div>
            <div class="mb-3 row">
                <label for="name_sr" class="col-sm-2 col-form-label">{{__('Name SR')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name_sr') is-invalid @enderror" id="name_sr" name="name_sr" value="{{ old('name_sr', $genre->name_sr) }}">
                    @error('name_sr')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>
            <div class="mb-3 row">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success">{{__('Save')}}</button>
                    <a href="{{ route('genre.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection