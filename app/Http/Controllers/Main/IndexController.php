<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        return view('main.index');
    }
}
