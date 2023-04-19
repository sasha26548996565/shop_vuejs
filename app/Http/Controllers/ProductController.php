<?php

namespace App\Http\Controllers;

use App\DTO\ProductDTO;
use App\Models\Product;
use Illuminate\Http\Request;
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

    public function index(Request $request): View
    {
        if ($request->search)
        {
            $products = Product::search($request->search)->withTrashed()->get();
        } else
        {
            $products = Product::withTrashed()->latest()->get();
        }
        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        return view('product.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->productService->store(new ProductDTO($request->validated()));
        return to_route('product.index');
    }

    public function show(int $productId): View
    {
        $product = Product::withTrashed()->findOrFail($productId);
        return view('product.show', compact('product'));
    }

    public function edit(int $productId): View
    {
        $product = Product::withTrashed()->findOrFail($productId);
        return view('product.edit', compact('product'));
    }

    public function update(UpdateRequest $request, int $productId): RedirectResponse
    {
        $product = Product::withTrashed()->findOrFail($productId);
        $this->productService->update(new ProductDTO($request->validated()), $product);
        return to_route('product.show', $product->id);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return to_route('product.index');
    }

    public function restore(int $productId): RedirectResponse
    {
        Product::withTrashed()->findOrFail($productId)->restore($productId);
        return to_route('product.show', $productId);
    }
}
