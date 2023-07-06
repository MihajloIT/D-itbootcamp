
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                
                    <a href="{{route('genre.create')}}" class="btn btn-primary">{{__ ("Add")}}</a>                
            </div>
            <div class="card">
                <div class="card-header">{{ __('Genre') }}</div>
                    <div class="car-body">
                        <table class="table caption-top">
                            <caption>List of genres</caption>
                            <thead>
                                <tr>
                                <th scope="col">id</th>
                                <th scope="col">{{ __ ("Name SR")}}</th>
                                <th scope="col">{{ __("Name EN")}}</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $g)
                                    <tr>
                                        <td>{{ $g->id }}</td> <!-- $g dali smo mu skracenicu, id je naziv u tabeli -->
                                        <td>{{ $g->name_en }}</td>
                                        <td>{{ $g->name_sr }}</td>
                                        <td>
                                            <a href="route{'genre.edit',['genre'=>$g]}" class="btn btn-success">{{ __('Edit')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                    </div>                
            </div>
        </div>
    </div>
</div>

@endsection
