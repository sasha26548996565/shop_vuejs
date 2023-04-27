<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use App\Http\Resources\Api\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'preview_image' => $this->getImageUrl(),
            'price' => $this->price,
            'new_price' => $this->new_price,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category)
        ];
    }
}
