@extends('layouts.master')

@section('content')
    <div class="card w-85 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('tag.index') }}">Tags</a>
                <a href="{{ route('tag.create') }}" class="btn btn-primary">Create tags</a>
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
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td><a href="{{ route('tag.show', $tag->id) }}">{{ $tag->title }}</a></td>
                            <td>
                                @if ($tag->isDeleted())
                                    <form action="{{ route('tag.restore', $tag->id) }}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-outline-primary" value="Restore">
                                    </form>
                                @else
                                    <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
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
