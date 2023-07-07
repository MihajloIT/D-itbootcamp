@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Genre'). ": ". __('Add')}}</div>
                <div class="car-body">
                    <form method="POST" action="{{route('people.store')}}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">{{__('Name')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
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
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname">
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
                                <input type="date" class="form-control @error('b_date') is-invalid @enderror" id="b_date" name="b_date">
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
                                <a href="{{ route('genre.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection