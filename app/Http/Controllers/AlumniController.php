<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = User::where('is_admin', false)->paginate(10);
        return view('alumni.index', [
            'title' => 'Alumni',
            'alumni' => $alumni,
        ]);
    }

    public function show(User $user)
    {
        $user->load('blogs');
        return view('alumni.show', [
            'title' => $user->name,
            'alumnus' => $user,
            'posts' => $user->blogs()->latest()->get(),
        ]);
    }
}
