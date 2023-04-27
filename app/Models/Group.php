<?php

declare(strict_types=1);

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = ['title'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'group_id', 'id');
    }

    #[SearchUsingPrefix(['title'])]
    #[SearchUsingFullText(['title'])]
    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title
        ];
    }

    public function isDeleted(): bool
    {
        return $this->deleted_at ? true : false;
    }
}
