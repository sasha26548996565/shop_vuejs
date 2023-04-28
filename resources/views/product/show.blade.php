@extends('layouts.master')

@section('content')
    <div class="card w-85 m-3">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('product.index') }}">Products</a>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit products</a>
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
                        <th>Preview Image</th>
                        <th>Images</th>
                        <th>Description</th>
                        <th>Price</th>
                        @if (isset($product->new_price))
                            <th>{{ $product->new_price }}</th>
                        @endif
                        <th>Count</th>
                        <th>Category</th>
                        <th>Group</th>
                        <th>Tags</th>
                        <th>Colors</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</td>
                        <td><img src="{{ Storage::url($product->preview_image) }}" width="250" height="250" alt="{{ $product->title }}"></td>
                        <td>
                            @foreach ($product->images as $image)
                                <img src="{{ Storage::url($image->image) }}" width="250" height="250" alt="{{ $product->title }}"><br>
                            @endforeach
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        @if (isset($product->new_price))
                            <td>{{ $product->new_price }}</td>
                        @endif
                        <td>{{ $product->count }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->group->title }}</td>
                        <td>
                            @foreach ($product->tags as $tag)
                                <span>{{ $tag->title }}</span>
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
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
