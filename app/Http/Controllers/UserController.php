<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->get();
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

    public function show(User $user): View
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        return to_route('user.show', $user->id);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return to_route('user.index');
    }
}
