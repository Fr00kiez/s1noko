<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required|in:user,admin',
            'password' => 'required|confirmed'
        ]);

        User::create($request->all());

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User has been created successfully.');
    }

    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required|in:user,admin',
            'password' => 'confirmed'
        ]);

        $data = array_filter($request->except(['_token', '_method', 'password_confirmation']));
        $user::find($user->id)->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User has been updated successfully.');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User has been deleted successfully.');
    }
}
