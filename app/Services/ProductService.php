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
    private ProductImagesService $productImagesService;

    public function __construct(ProductImagesService $productImagesService)
    {
        $this->productImagesService = $productImagesService;
    }

    public function store(ProductDTO $params): void
    {
        DB::beginTransaction();
        try
        {
            $params->preview_image = Storage::disk('public')->put('/products', $params->preview_image);
            $product = Product::create($params->except('tags')->except('colors')->except('images')->toArray());
            $product->tags()->attach($params->tags);
            $product->colors()->attach($params->colors);
            $this->productImagesService->setImages($params->images, $product->id);
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
                $params->preview_image = $this->productImagesService->updateImage($product->preview_image, $params->preview_image);
            } else
            {
                $params->preview_image = $product->preview_image;
            }
            $product->update($params->except('colors')->except('tags')->except('images')->toArray());
            $product->tags()->sync($params->tags);
            $product->colors()->sync($params->colors);
            if ($params->images != null)
            {
                $this->productImagesService->updateImages($product->images, $params->images, $product->id);
            }
            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollback();
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
