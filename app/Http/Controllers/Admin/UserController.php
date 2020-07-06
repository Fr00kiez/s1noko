<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        $totalUsers = User::query()
            ->count();
        $newUsersThisMonth = User::query()
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->count();
        $activeUsersToday = User::query()
            ->whereDate('updated_at', '=', date('Y-m-d'))
            ->count();
        $newUsersToday = User::query()
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();

        $viewData = compact('totalUsers', 'newUsersThisMonth', 'activeUsersToday', 'newUsersToday');

        return $dataTable->render('admin.users.index', $viewData);
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

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type'),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User has been created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
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

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User has been deleted successfully.');
    }
}
