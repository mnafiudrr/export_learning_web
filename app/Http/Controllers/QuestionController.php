<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Quis;
use App\Models\Question;
use App\Models\Option;

use App\Http\Requests\CreateQuestionsRequest;
use Illuminate\Support\Facades\DB;

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

    public function create(Request $req)
    {
        if (!$req->quisId) {
            return 'no quis id found';
        }
        $quis = Quis::find($req->quisId);
        return view('pages.quis.question.question-create', compact('quis'));
    }

    public function store(CreateQuestionsRequest $req)
    {
        $payload = collect($req);
        DB::beginTransaction();
        try {
            foreach ($payload['questions'] as $idx => $question) {
                $q = Question::create([
                        'quis_id' => $payload['quis_id'],
                        'question' => $question['question'],
                        'key'       => $question['key']
                     ]);

                foreach ($question['answers'] as $jj => $ans) {
                    Option::create([
                        'question_id' => $q->id,
                        'value' => $ans,
                        'correct' => $ans === $question['key']
                    ]);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        DB::commit();
    }

    public function show($questionId)
    {
        $question = Question::with('options')->find($questionId);

        $quis = Quis::find($question->quis_id);
        $payload = [
            'quis_title' => $quis->title,
            'question' => $question
        ];
        return view('pages.quis.question.question-show', compact('payload'));
        // dd($question);
    }
}
