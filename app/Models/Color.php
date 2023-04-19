<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Color extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = ['title'];

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
