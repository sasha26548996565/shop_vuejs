<?php

namespace App\Providers;

use App\ViewComposers\TagComposer;
use App\ViewComposers\ColorComposer;
use Illuminate\Support\Facades\View;
use App\ViewComposers\CategoryComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer(['product.create', 'product.edit'], CategoryComposer::class);
        View::composer(['product.create', 'product.edit'], TagComposer::class);
        View::composer(['product.create', 'product.edit'], ColorComposer::class);
    }
}
