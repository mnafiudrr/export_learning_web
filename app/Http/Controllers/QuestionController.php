<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;

class QuestionController extends Controller
{
    //

   
    public function getByQuisId(Request $req, $quisId)
    {
        $numOfQuestions = $req->question_amount ?? 10;

        $questions = Question::where('quis_id', $quisId)->with([
            'quis',
            'options'
        ])->get()->take($numOfQuestions);


        if ($req->randomize) {
            $questions = $questions->shuffle();
        }
        return response()->json($questions, 200);
    }
}
