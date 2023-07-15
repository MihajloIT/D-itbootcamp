@extends('layouts.app')
@section('content')

<div class="card">
    <a href="{{route('people.create')}}" class="btn btn-primary">{{__ ("Add")}}</a>
</div>
<div class="card">
    <div class="card-header">{{ __('People') }}</div>
    <div class="car-body">
        <table class="table table-striped">
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
                        <form action="{{route('people.destroy', ['people'=>$g->id])}}" method="POST">
                            @method('delete')
                            @csrf
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('people.edit', [ 'people' =>$g->id]) }}" class="btn btn-success">{{ __('Edit')}}</a>
                                <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete')}}</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex">
            {{ $data->links() }}
        </div>
    </div>
</div>


@endsection