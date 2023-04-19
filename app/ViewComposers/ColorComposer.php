<?php

declare(strict_types=1);

namespace App\ViewComposers;

use App\Models\Color;
use Illuminate\Contracts\View\View;

class ColorComposer
{
    public function compose(View $view): View
    {
        return $view->with('colors', Color::latest()->get());
    }
}
