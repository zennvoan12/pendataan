<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller; // import Laravel controller
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = Auth::user();
        return view('dashboard.account.show', [
            'title' => 'My Profile',
            'user' => $user,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.account.edit', [
            'title' => 'Edit Profile',
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'bio' => 'nullable|string',
            'occupation' => 'nullable|string|max:255',
            'education_level' => 'nullable|string|max:255',
            'twitter' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'photo' => 'nullable|image|file|max:2048',
            'password' => ['nullable', 'min:5'],
        ]);

        $validatedData['is_active'] = $request->has('is_active');

        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('profile-photos');
            if ($user->photo) {
                Storage::delete($user->photo);
            }
        } else {
            $validatedData['photo'] = $user->photo;
        }

        $user->update($validatedData);

        return redirect()->route('account.show')->with('success', 'Profile updated successfully');
    }
}
