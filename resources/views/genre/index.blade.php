@extends('layouts.app')
@section('content')


<div class="card">
    <a href="{{route('genre.create')}}" class="btn btn-primary">{{__ ("Add")}}</a>
</div>
<div class="card">
    <div class="card-header">{{ __('Genre') }}</div>
    <div class="car-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __ ("No.")}}</th>
                    <th scope="col">id</th>
                    <th scope="col">{{ __ ("Name SR")}}</th>
                    <th scope="col">{{ __("Name EN")}}</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $g)
                <tr>
                    <td>{{ ($data->currentPage()-1)*$data->perPage()+ $loop ->iteration }}</td> <!-- Ovde ubacuje na kojoji je element, nezavisno od id-ja -->
                    <td>{{ $g->id }}</td> <!-- $g dali smo mu skracenicu, id je naziv u tabeli -->
                    <td>{{ $g->name_en }}</td>
                    <td>{{ $g->name_sr }}</td>
                    <td>

                        <form action="{{route('genre.destroy', ['genre'=>$g->id])}}" method="POST">
                            @method('delete')
                            @csrf
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('genre.edit', [ 'genre' =>$g->id]) }}" class="btn btn-success">{{ __('Edit')}}</a>
                                <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete')}}</button>
                        </form>
    </div>
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