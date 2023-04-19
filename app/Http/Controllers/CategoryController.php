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
        $categories = Category::withTrashed()->latest()->get();
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

    public function show(int $categoryId): View
    {
        $category = Category::withTrashed()->findOrFail($categoryId);
        return view('category.show', compact('category'));
    }

    public function edit($categoryId): View
    {
        $category = Category::withTrashed()->findOrFail($categoryId);
        return view('category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, int $categoryId): RedirectResponse
    {
        $category = Category::withTrashed()->findOrFail($categoryId);
        $category->update($request->validated());
        return to_route('category.show', $category->id);
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route('category.index');
    }

    public function restore(int $categoryId): RedirectResponse
    {
        Category::withTrashed()->findOrFail($categoryId)->restore($categoryId);
        return to_route('category.show', $categoryId);
    }
}
