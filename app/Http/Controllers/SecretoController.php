<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\Answer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SecretoController extends Controller
{
    public function createProfile()
    {
        return view('create');
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'default_question' => 'nullable|string',
        ]);

        $slug = Str::slug($request->name) . '-' . Str::random(5);
        $profile = UserProfile::create([
            'name' => $request->name,
            'slug' => $slug,
            'default_question' => $request->default_question,
        ]);

        return redirect()->route('profile.show', $slug);
    }

    public function showProfile($slug)
    {
        $profile = UserProfile::where('slug', $slug)->firstOrFail();
        $answers = $profile->answers()->latest()->get();

        return view('profile', compact('profile', 'answers'));
    }

    public function submitAnswer(Request $request, $slug)
    {
        $request->validate(['answer' => 'required']);
        $profile = UserProfile::where('slug', $slug)->firstOrFail();

        $profile->answers()->create([
            'answer' => $request->answer,
        ]);

        return back()->with('success', 'Jawaban kamu berhasil dikirim secara anonim!');
    }
}
