<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Api\FilterRequest;
use App\Http\Resources\Api\ProductResource;
use App\Http\Resources\Api\IndexProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(FilterRequest $request): AnonymousResourceCollection
    {
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($request->validated())]);
        return IndexProductResource::collection(Product::filter($filter)->latest()->get());
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
