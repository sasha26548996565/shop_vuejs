<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\ProductDTO;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function store(ProductDTO $params): void
    {
        DB::beginTransaction();
        try
        {
            $params->preview_image = Storage::disk('public')->put('/products', $params->preview_image);
            $product = Product::create($params->except('tags')->except('colors')->except('images')->toArray());
            $product->tags()->attach($params->tags);
            $product->colors()->attach($params->colors);
            $this->setImages($params->images, $product->id);
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
                $params->preview_image = $this->updateImage($product->preview_image, $params->preview_image);
            } else
            {
                $params->preview_image = $product->preview_image;
            }
            $product->update($params->except('colors')->except('tags')->except('images')->toArray());
            $product->tags()->sync($params->tags);
            $product->colors()->sync($params->colors);
            if ($params->images != null)
            {
                $this->updateImages($product->images, $params->images, $product->id);
            }
            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollback();
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function setImages(array $images, int $productId): void
    {
        foreach ($images as $image)
        {
            $pathImage = Storage::disk('public')->put('/products/images', $image);
            ProductImage::create(['product_id' => $productId, 'image' => $pathImage]);
        }
    }

    private function updateImages(Collection $oldImages, array $newImages, int $productId): void
    {
        foreach ($newImages as $index => $newImage)
        {
            $pathImage = Storage::disk('public')->put('/products/images', $newImage);
            ProductImage::updateOrCreate([
                'image' => $oldImages[$index]->image
            ], ['image' => $pathImage, 'product_id' => $productId]);
        }
    }

    private function updateImage(string $oldPreviewImage, UploadedFile $newPreviewImage): string
    {
        Storage::disk('public')->delete($oldPreviewImage);
        return Storage::disk('public')->put('/products', $newPreviewImage);
    }
}
