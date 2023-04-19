<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\ProductDTO;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function store(ProductDTO $params): void
    {
        DB::beginTransaction();
        try
        {
            $params->preview_image = Storage::disk('public')->put('/products', $params->preview_image);
            $product = Product::create($params->except('tags')->except('colors')->toArray());
            $product->tags()->attach($params->tags);
            $product->colors()->attach($params->colors);
            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollBack();
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(ProductDTO $params, Product $product): void
    {
        DB::beginTransaction();
        try
        {
            if ($params->preview_image != null)
            {
                Storage::delete($product->preview_image);
                $params->preview_image = Storage::disk('public')->put('/products', $params->preview_image);
            } else
            {
                $params->preview_image = $product->preview_image;
            }
            $product->update($params->except('colors')->except('tags')->toArray());
            $product->tags()->sync($params->tags);
            $product->colors()->sync($params->colors);

            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollback();
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
