@extends('layouts.master')

@section('content')
    <div class="card card-primary w-25 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('category.index') }}">Categories</a>
                <a href="#">Edit category</a>
            </h3>
        </div>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="title" placeholder="Enter title">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
