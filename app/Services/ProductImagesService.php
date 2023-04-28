<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\ProductImage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class ProductImagesService
{
    public function setImages(array $images, int $productId): void
    {
        foreach ($images as $image)
        {
            $pathImage = Storage::disk('public')->put('/products/images', $image);
            ProductImage::create(['product_id' => $productId, 'image' => $pathImage]);
        }
    }

    public function updateImages(Collection $oldImages, array $newImages, int $productId): void
    {
        foreach ($newImages as $index => $newImage)
        {
            $pathImage = Storage::disk('public')->put('/products/images', $newImage);
            ProductImage::updateOrCreate([
                'image' => $oldImages[$index]->image
            ], ['image' => $pathImage, 'product_id' => $productId]);
        }
    }

    public function updateImage(string $oldPreviewImage, UploadedFile $newPreviewImage): string
    {
        Storage::disk('public')->delete($oldPreviewImage);
        return Storage::disk('public')->put('/products', $newPreviewImage);
    }
}
