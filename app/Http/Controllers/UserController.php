<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index(bool $renderUI = false)
    {
        $users = User::with(['games'])->get();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }
}
