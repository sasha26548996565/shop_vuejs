@extends('layouts.master')

@section('content')
    <div class="card w-85 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('color.index') }}">Colors</a>
                <a href="{{ route('color.create') }}" class="btn btn-primary">Create colors</a>
            </h3>
            <div class="card-tools">
                @include('includes.search')
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td><a href="{{ route('color.show', $color->id) }}">{{ $color->title }}</a></td>
                            <td>
                                @if ($color->isDeleted())
                                    <form action="{{ route('color.restore', $color->id) }}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-outline-primary" value="Restore">
                                    </form>
                                @else
                                    <form action="{{ route('color.destroy', $color->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-outline-danger" value="Delete">
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
