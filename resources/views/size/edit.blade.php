@extends('layouts.master')

@section('content')
    <div class="card card-primary w-25 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('size.index') }}">Sizes</a>
                <a href="#">Edit size</a>
            </h3>
        </div>
        <form action="{{ route('size.update', $size->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $size->title }}" class="form-control" id="title" placeholder="Enter title">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
