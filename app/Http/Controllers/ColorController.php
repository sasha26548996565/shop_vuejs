<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;

class ColorController extends Controller
{
    public function index(): View
    {
        $colors = Color::latest()->get();
        return view('color.index', compact('colors'));
    }

    public function create(): View
    {
        return view('color.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        Color::create($request->validated());
        return to_route('color.index');
    }

    public function show(Color $color): View
    {
        return view('color.show', compact('color'));
    }

    public function edit(Color $color): View
    {
        return view('color.edit', compact('color'));
    }

    public function update(UpdateRequest $request, Color $color): RedirectResponse
    {
        $color->update($request->validated());
        return to_route('color.show', $color->id);
    }

    public function destroy(Color $color): RedirectResponse
    {
        $color->delete();
        return to_route('color.index');
    }
}
