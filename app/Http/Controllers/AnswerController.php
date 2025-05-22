<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function store(Request $request, $slug)
    {
        $request->validate(['answer' => 'required|string']);
        
        $profile = Profile::where('slug', $slug)->firstOrFail();

        $profile->answers()->create([
            'answer' => $request->answer
        ]);

        return back()->with('success', 'Jawaban berhasil dikirim!');
    }
}
