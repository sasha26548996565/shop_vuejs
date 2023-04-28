<?php

declare(strict_types=1);

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    private const PRICE_FROM = 'priceFrom';
    private const PRICE_TO = 'priceTo';
    private const PROPERTIES = 'tags';
    private const SORT = 'sort';
    private const CATEGORIES = 'categories';

    public function getCallbacks(): array
    {
        return [
            self::PRICE_FROM => [$this, 'priceFrom'],
            self::PRICE_TO => [$this, 'priceTo'],
            self::PROPERTIES => [$this, 'tags'],
            self::SORT => [$this, 'sort'],
            self::CATEGORIES => [$this, 'categories'],
        ];
    }

    public function priceFrom(Builder $builder, $value): void
    {
        $builder->where('price', '>=', $value * 100);
    }

    public function priceTo(Builder $builder, $value): void
    {
        $builder->where('price', '<=', $value * 100);
    }

    public function tags(Builder $builder, $value): void
    {
        $builder->whereHas('tags', function(Builder $builder) use ($value) {
            $builder->whereIn('tag_id', $value);
        });
    }

    public function colors(Builder $builder, $value): void
    {
        $builder->whereHas('colors', function(Builder $builder) use ($value) {
            $builder->whereIn('color_id', $value);
        });
    }

    public function categories(Builder $builder, $value): void
    {
        $builder->whereIn('category_id', $value);
    }
}
