<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quis;
use App\Models\Question;

use App\Http\Requests\SubmitQuizAnswerRequest;

class QuisController extends Controller
{
    //
    public function index(Request $req)
    {
        $pageSize = $req->pageSize ?? 12;

        $quises = Quis::paginate($req->pageSize);
        return response()->json($quises, 200);
    }


    public function get(Request $req, $id)
    {
        $quis = Quis::with([
            'questions.options'
        ])->find($id);
        return response()->json($quis, 200);
    }

    public function submitQuis(SubmitQuizAnswerRequest $req)
    {
        $quis = Quis::with('questions')->find($req->quis_id);
    
        if (!$quis) {
            return response()->json(['message' => 'quis not found'], 404);
        }

        $questions = $quis->questions;

        $numOfQuestions = $questions->count();
        $answers = $questions->map(function ($question) {
            return $question->key;
        });

        $submittedAnswers = collect($req->answers);
        $amountTrue = $answers->intersect($submittedAnswers)->count();


        $score = $amountTrue / $numOfQuestions * 100;

        return response()->json(
            [
                'jumlah_benar' => $amountTrue,
                'jumlah_salah' => $numOfQuestions - $amountTrue,
                'jumlah_soal' => $numOfQuestions,
                'nilai' => $score
             ],
            200
        );
    }
}
