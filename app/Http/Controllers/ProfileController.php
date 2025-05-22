<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->take(10)->get();
        return view('questions.index', compact('profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'default_question' => 'nullable|string'
        ]);

        $profile = Profile::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name . '-' . Str::random(5)),
            'default_question' => $request->default_question
        ]);

        return redirect()->route('profile.show', $profile->slug)
                         ->with('success', 'Link profil berhasil dibuat!');
    }

    public function show($slug)
    {
        $profile = Profile::where('slug', $slug)->firstOrFail();
        $answers = $profile->answers()->latest()->get();

        return view('questions.show', compact('profile', 'answers'));
    }
}