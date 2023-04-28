<?php

namespace App\Http\Resources\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $products = Product::where('group_id', $this->group_id)->latest()->get();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'preview_image' => $this->getImageUrl(),
            'price' => $this->price,
            'new_price' => $this->new_price,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'product_images' => ProductImagesResource::collection($this->images),
            'group_products' => MinProductResource::collection($products),
        ];
    }
}
