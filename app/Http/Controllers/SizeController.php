<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Size\StoreRequest;
use App\Http\Requests\Size\UpdateRequest;

class SizeController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search)
        {
            $sizes = Size::search($request->search)->withTrashed()->get();
        } else
        {
            $sizes = Size::withTrashed()->latest()->get();
        }
        return view('size.index', compact('sizes'));
    }

    public function create(): View
    {
        return view('size.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        Size::create($request->validated());
        return to_route('size.index');
    }

    public function show(int $sizeId): View
    {
        $size = Size::withTrashed()->findOrFail($sizeId);
        return view('size.show', compact('size'));
    }

    public function edit(int $sizeId): View
    {
        $size = Size::withTrashed()->findOrFail($sizeId);
        return view('size.edit', compact('size'));
    }

    public function update(UpdateRequest $request, int $sizeId): RedirectResponse
    {
        $size = Size::withTrashed()->findOrFail($sizeId);
        $size->update($request->validated());
        return to_route('size.show', $size->id);
    }

    public function destroy(Size $size): RedirectResponse
    {
        $size->delete();
        return to_route('size.index');
    }

    public function restore(int $sizeId): RedirectResponse
    {
        Size::withTrashed()->findOrFail($sizeId)->restore($sizeId);
        return to_route('size.show', $sizeId);
    }
}
