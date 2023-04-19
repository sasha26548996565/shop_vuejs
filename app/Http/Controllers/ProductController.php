<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Color;
use App\DTO\ProductDTO;
use App\Models\Product;
use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        $tags = Tag::all();
        $categories = Category::all();
        $colors = Color::all();
        return view('product.create', compact('tags', 'colors', 'categories'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->productService->store(new ProductDTO($request->validated()));
        return to_route('product.index');
    }

    public function show(Product $product): View
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        $tags = Tag::all();
        $categories = Category::all();
        $colors = Color::all();
        return view('product.edit', compact('tags', 'colors', 'categories', 'product'));
    }

    public function update(UpdateRequest $request, Product $product): RedirectResponse
    {
        $this->productService->update(new ProductDTO($request->validated()), $product->id);
        return to_route('product.show', $product->id);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return to_route('product.index');
    }
}
