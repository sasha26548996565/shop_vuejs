<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use App\Http\Resources\Api\IndexProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return IndexProductResource::collection(Product::latest()->get());
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
