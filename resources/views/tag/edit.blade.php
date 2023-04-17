@extends('layouts.master')

@section('content')
    <div class="card card-primary w-25 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('tag.index') }}">Tags</a>
                <a href="#">Edit tag</a>
            </h3>
        </div>
        <form action="{{ route('tag.update', $tag->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $tag->title }}" class="form-control" id="title" placeholder="Enter title">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
