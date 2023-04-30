<?php

declare(strict_types=1);

namespace App\ViewComposers;

use App\Models\Group;
use Illuminate\Contracts\View\View;

class GroupComposer
{
    public function compose(View $view): View
    {
        return $view->with('groups', Group::latest()->get());
    }
}
