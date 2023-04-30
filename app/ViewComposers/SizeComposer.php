<?php

declare(strict_types=1);

namespace App\ViewComposers;

use App\Models\Size;
use Illuminate\Contracts\View\View;

class SizeComposer
{
    public function compose(View $view): View
    {
        return $view->with('sizes', Size::latest()->get());
    }
}
