<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller; // Ensure correct Controller is imported
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // Resource methods expected by Route::resource
    public function index()
    {
        return $this->usersIndex();
    }

    public function edit(User $user)
    {
        return $this->userEdit($user);
    }

    public function update(Request $request, User $user)
    {
        return $this->userUpdate($request, $user);
    }

    public function destroy(User $user)
    {
        return $this->userDestroy($user);
    }

    public function usersIndex()
    {
        return view('dashboard.admin.users.index', [
            'users' => User::withCount('blogs')->latest()->paginate(10),
            'title' => 'Manage Users'
        ]);
    }
    public function userEdit(User $user)
    {
        return view('dashboard.admin.users.edit', compact('user'));
    }

    public function userUpdate(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'bio' => 'nullable|string',
            'is_admin' => 'boolean',
        ]);

        // Explicitly cast admin checkbox to boolean so unchecked state is saved
        $validatedData['is_admin'] = $request->boolean('is_admin');

        $user->update($validatedData);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    public function userDestroy(User $user)
    {
        // Cegah admin menghapus dirinya sendiri
        if (optional(Auth::user())->id === $user->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'You cannot delete yourself');
        }


        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }
}
