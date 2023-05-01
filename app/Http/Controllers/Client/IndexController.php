<?php

declare(strict_types=1);

namespace App\Http\Controllers\Client;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(): View
    {
        return view('client.main.index');
    }
}
