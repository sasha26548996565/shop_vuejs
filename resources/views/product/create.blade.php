@extends('layouts.master')

@section('content')
    <div class="card card-primary w-25 m-3">
        <div class="card-header">
            <h3 class="card-title">Create product</h3>
        </div>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title"
                        placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Enter description">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Enter price"
                        value="{{ old('price') }}">
                </div>
                <div class="form-group">
                    <label for="count">Count</label>
                    <input type="number" name="count" class="form-control" id="count" placeholder="Enter count"
                        value="{{ old('count') }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" id="category_id">
                        @foreach ($categories as $category)
                            <option @selected(old('category_id') == $category->id) value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select class="select2 w-50" name="tags[]" id="tags" data-placeholder="Change tag"
                        multiple="multiple">
                        @foreach ($tags as $tag)
                            <option @selected(is_array(old('tags')) && in_array($tag->id, old('tags')))
                                value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">colors</label>
                    <select class="select2 w-50" name="colors[]" id="colors" data-placeholder="Choose color"
                        multiple="multiple">
                        @foreach ($colors as $color)
                            <option @selected(is_array(old('colors')) && in_array($color->id, old('colors')))
                                value="{{ $color->id }}">{{ $color->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="preview_image">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="preview_image" class="custom-file-input" id="preview_image">
                            <label class="custom-file-label" for="preview_image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="isPublished">
                    <label class="form-check-label" for="isPublished">Is published</label>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
