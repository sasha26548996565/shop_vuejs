<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Models\Color;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FilterListController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'tags' => Tag::orderBy('title', 'ASC')->get(),
            'colors' => Color::orderBy('title', 'ASC')->get(),
            'categories' => Category::orderBy('title', 'ASC')->get(),
        ]);
    }
}
