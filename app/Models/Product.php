<?php

declare(strict_types=1);

namespace App\Models;

use Laravel\Scout\Searchable;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, SoftDeletes, Searchable, Filterable;

    protected $fillable = [
        'title', 'description', 'preview_image', 'count', 'price', 'old_price',
        'is_published', 'category_id', 'user_id', 'group_id'
    ];

    public const ALLOWED_SORT = ['title', 'price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100
        );
    }

    public function getOldPrice(): float|null
    {
        return $this->old_price != null ? $this->old_price / 100 : null;
    }

    #[SearchUsingPrefix(['title', 'description'])]
    #[SearchUsingFullText(['title', 'description'])]
    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description
        ];
    }

    public function isDeleted(): bool
    {
        return $this->deleted_at ? true : false;
    }

    public function getImageUrl(): string
    {
        return url(Storage::url($this->preview_image));
    }
}
