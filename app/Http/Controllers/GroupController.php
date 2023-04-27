<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateRequest;

class GroupController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search)
        {
            $groups = Group::search($request->search)->withTrashed()->get();
        } else
        {
            $groups = Group::withTrashed()->latest()->get();
        }

        return view('group.index', compact('groups'));
    }

    public function create(): View
    {
        return view('group.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        Group::create($request->validated());
        return to_route('group.index');
    }

    public function show(int $groupId): View
    {
        $group = Group::withTrashed()->findOrFail($groupId);
        return view('group.show', compact('group'));
    }

    public function edit(int $groupId): View
    {
        $group = Group::withTrashed()->findOrFail($groupId);
        return view('group.edit', compact('group'));
    }

    public function update(UpdateRequest $request, int $groupId): RedirectResponse
    {
        $group = Group::withTrashed()->findOrFail($groupId);
        $group->update($request->validated());
        return to_route('group.show', $group->id);
    }

    public function destroy(group $group): RedirectResponse
    {
        $group->delete();
        return to_route('group.index');
    }

    public function restore(int $groupId): RedirectResponse
    {
        Group::withTrashed()->findOrFail($groupId)->restore($groupId);
        return to_route('group.show', $groupId);
    }
}
