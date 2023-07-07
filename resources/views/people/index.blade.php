
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            <div class="card">
                <div class="card-header">{{ __('People') }}</div>
                    <div class="car-body">
                        <table class="table caption-top">
                            <caption>List of people</caption>
                            <thead>
                                <tr>
                                <th scope="col">id</th>
                                <th scope="col">{{ __ ("Name")}}</th>
                                <th scope="col">{{ __("Surname")}}</th>
                                <th scope="col">{{ __("Birth")}}</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $g)
                                    <tr>
                                        <td>{{ $g->id }}</td> <!-- $g dali smo mu skracenicu, id je naziv u tabeli -->
                                        <td>{{ $g->name }}</td>
                                        <td>{{ $g->surname }}</td>
                                        <td>{{ $g->b_date }}</td>
                                        <td>
                                            <a href="{{ route('people.edit', [ 'people' =>$g->id]) }}" class="btn btn-success">{{ __('Edit')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                    </div>                
            </div>
            <div class="card">                
                    <a href="{{route('people.create')}}" class="btn btn-primary">{{__ ("Add")}}</a>                
            </div>
        </div>
    </div>
</div>

@endsection