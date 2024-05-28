<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::all();
        return view('alumni', compact('alumnis'),[
            'title'=> 'Data alumni',
        ]);
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_year' => 'required|date',
            'graduation_year' => 'required|date',
            'major' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Alumni::create($request->all());

        return redirect()->route('alumni.index')->with('success', 'Alumni created successfully.');
    }
}
