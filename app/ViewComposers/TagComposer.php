<?php

declare(strict_types=1);

namespace App\ViewComposers;

use App\Models\Tag;
use Illuminate\Contracts\View\View;

class TagComposer
{
    public function compose(View $view): View
    {
        return $view->with('tags', Tag::latest()->get());
    }
}
