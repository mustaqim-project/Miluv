<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\User;
use Auth;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::inRandomOrder()->get();
        return view('quiz.index', compact('questions'));
    }

    public function submit(Request $request)
    {
        $totalScore = 0;
        foreach ($request->answers as $score) {
            $totalScore += (int) $score;
        }

        $user = Auth::user();
        $user->married_score_test = $totalScore;
        $user->save();

        return redirect()->route('quiz.result')->with('score', $totalScore);
    }

    public function result()
    {
        return view('quiz.result', ['score' => session('score')]);
    }
}
