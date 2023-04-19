<?php

namespace App\Http\Controllers;

use App\DTO\ProductDTO;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
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
        $params = new ProductDTO($request->validated());
        DB::beginTransaction();
        try
        {
            $params->preview_image = Storage::disk('public')->put('/products', $params->preview_image);
            $product = Product::create($params->except('tags')->except('colors')->toArray());
            $product->tags()->attach($params->tags);
            $product->colors()->attach($params->colors);
            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollBack();
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

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
        $params = new ProductDTO($request->validated());
        DB::beginTransaction();
        try
        {
            if ($params->preview_image != null)
            {
                Storage::delete($product->preview_image);
                $params->preview_image = Storage::disk('public')->put('/products', $params->preview_image);
            } else
            {
                $params->preview_image = $product->preview_image;
            }
            $product->update($params->except('colors')->except('tags')->toArray());
            $product->tags()->sync($params->tags);
            $product->colors()->sync($params->colors);

            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollback();
            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return to_route('product.show', $product->id);
    }


    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return to_route('product.index');
    }
}
