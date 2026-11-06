<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
        public function index()
    {
        // $users = User::all();
        $users = User::simplePaginate(8);

        return view('users.index', compact('users'));
    }

     public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'active' => 'required|boolean',
        ]);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'user added');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8',
            'active' => 'required|boolean',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'usr updated');
    }

    public function destroy(User $user)
    {
        if($user->assignments()->exists()){
            return redirect()->route('users.index')
            ->with('error','user has assigned company assets can be deleted once assets retured ');
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'user deleted');
    }
}
