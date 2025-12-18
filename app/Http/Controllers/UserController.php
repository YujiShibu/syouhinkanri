<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 一覧
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // 編集画面
    public function edit(User $user)
{
    $groups = [
        '営業課',
        '人事部',
        '総務部',
        '開発部',
    ];

    return view('users.edit', compact('user', 'groups'));
}

    // 更新
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
        ]);

        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', '更新しました');
    }

    // 削除
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', '削除しました');
    }


    public function create() {}
    public function store(Request $request) {}
    public function show(User $user) {}
}
