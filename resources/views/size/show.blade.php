@extends('layouts.master')

@section('content')
    <div class="card w-85 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('size.index') }}">Sizes</a>
                <a href="{{ route('size.edit', $size->id) }}" class="btn btn-primary">Edit size</a>
                @if ($size->isDeleted())
                    <form action="{{ route('size.restore', $size->id) }}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-outline-primary" value="Restore">
                    </form>
                @else
                    <form action="{{ route('size.destroy', $size->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-danger" value="Delete">
                    </form>
                @endif
            </h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $size->id }}</td>
                        <td>{{ $size->title }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection