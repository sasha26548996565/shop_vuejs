<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $params = $request->validated();
        try
        {
            DB::beginTransaction();
            $params['preview_image'] = Storage::disk('public')->put('/products', $params['preview_image']);
            $tags = $params['tags'];
            $colors = $params['colors'];
            unset($params['tags'], $params['colors']);
            $product = Product::create($params);
            $product->tags()->attach($tags);
            $product->colors()->attach($colors);
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
        $params = $request->validated();
        try
        {
            DB::beginTransaction();
            if (array_key_exists('preview_image', $params))
            {
                Storage::delete($product->preview_image);
                $params['preview_image'] = Storage::disk('public')->put('/products', $params['preview_image']);
            }
            $tags = $params['tags'];
            $colors = $params['colors'];
            unset($params['tags'], $params['colors']);
            $product->update($params);
            $product->tags()->sync($tags);
            $product->colors()->sync($colors);
            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollBack();
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
