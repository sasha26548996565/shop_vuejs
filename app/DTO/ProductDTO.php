<?php

declare(strict_types=1);

namespace App\DTO;

use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class ProductDTO extends DataTransferObject
{
    public string $title;
    public string $description;
    public string|UploadedFile|null $preview_image;
    public int $count;
    public int $price;
    public ?int $new_price;
    public int $is_published = 0;
    public int $category_id;
    public int $group_id;
    public array $tags;
    public array $colors;
}
