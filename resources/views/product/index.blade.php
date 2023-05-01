@extends('layouts.master')

@section('content')
    <div class="card w-85 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('product.index') }}">Products</a>
                <a href="{{ route('product.create') }}" class="btn btn-primary">Create products</a>
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
                        <th>Price</th>
                        <th>Old Price</th>
                        <th>Count</th>
                        <th>Category</th>
                        <th>Group</th>
                        <th>Tags</th>
                        <th>Size</th>
                        <th>Colors</th>
                        <th>Published</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->old_price ?? '-' }}</td>
                            <td>{{ $product->count }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->group->title }}</td>
                            <td>
                                @foreach ($product->tags as $tag)
                                    <span>{{ $tag->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($product->sizes as $size)
                                    <span>{{ $size->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($product->colors as $color)
                                    <span>{{ $color->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($product->isDeleted())
                                    <form action="{{ route('product.restore', $product->id) }}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-outline-primary" value="Restore">
                                    </form>
                                @else
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-outline-danger" value="Delete">
                                    </form>
                                @endif
                            </td>
                            <td>{{ $product->is_published ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
