<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->search)
        {
            $users = User::search($request->search)->withTrashed()->get();
        } else
        {
            $users = User::withTrashed()->latest()->get();
        }
        return view('user.index', compact('users'));
    }

    public function create(): View
    {
        return view('user.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return to_route('user.index');
    }

    public function show(int $userId): View
    {
        $user = User::withTrashed()->findOrFail($userId);
        return view('user.show', compact('user'));
    }

    public function edit(int $userId): View
    {
        $user = User::withTrashed()->findOrFail($userId);
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, int $userId): RedirectResponse
    {
        $user = User::withTrashed()->findOrFail($userId);
        $user->update($request->validated());
        return to_route('user.show', $user->id);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return to_route('user.index');
    }

    public function restore(int $userId): RedirectResponse
    {
        User::withTrashed()->findOrFail($userId)->restore($userId);
        return to_route('tag.show', $userId);
    }
}
