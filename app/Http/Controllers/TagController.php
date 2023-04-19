<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search)
        {
            $tags = Tag::search($request->search)->withTrashed()->get();
        } else
        {
            $tags = Tag::withTrashed()->latest()->get();
        }
        return view('tag.index', compact('tags'));
    }

    public function create(): View
    {
        return view('tag.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        Tag::create($request->validated());
        return to_route('tag.index');
    }

    public function show(int $tagId): View
    {
        $tag = Tag::withTrashed()->findOrFail($tagId);
        return view('tag.show', compact('tag'));
    }

    public function edit(int $tagId): View
    {
        $tag = Tag::withTrashed()->findOrFail($tagId);
        return view('tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, int $tagId): RedirectResponse
    {
        $tag = Tag::withTrashed()->findOrFail($tagId);
        $tag->update($request->validated());
        return to_route('tag.show', $tag->id);
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return to_route('tag.index');
    }

    public function restore(int $tagId): RedirectResponse
    {
        Tag::withTrashed()->findOrFail($tagId)->restore($tagId);
        return to_route('tag.show', $tagId);
    }
}
