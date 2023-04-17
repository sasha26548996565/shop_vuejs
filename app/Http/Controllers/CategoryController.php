<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        Category::create($request->validated());
        return to_route('category.index');
    }

    public function show(Category $category): View
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());
        return to_route('category.show', $category->id);
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route('category.index');
    }
}
