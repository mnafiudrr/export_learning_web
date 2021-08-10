<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quis;
use App\Models\Question;
use App\Models\Option;

use App\Http\Requests\SubmitQuizAnswerRequest;
use App\Http\Requests\CreateQuisRequest;
use Illuminate\Support\Facades\DB;


use App\Services\ImageService;

use Carbon\Carbon;

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


    
    public function indexQuis()
    {
        $quises = Quis::all();
        return view('pages.quis.quis-index', compact('quises'));
    }

    public function create()
    {
        return view('pages.quis.quis-create');
    }

    public function store(CreateQuisRequest $req)
    {
        $payload = collect($req);

        $quisPayload = $payload->only(['title','logo','header']);


        $timestamps = Carbon::now()->toDateTimeString(); //Timestamps for file naming
        
        $files = $payload->only(['logo','header'/* ,'photo' */]);


        /* Current file naming : {filetype}_{timestamps} */

        foreach ($files as $key => $value) {
            /* Magic Code to store images */
            $quisPayload[$key] = ImageService::storeImage($value, $key, $key.$timestamps);
        }
        DB::beginTransaction();
        try {
            $quis = Quis::create($quisPayload->toArray());
            foreach ($payload['questions'] as $idx => $question) {
                $q = Question::create([
                    'quis_id' => $quis->id,
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
        return "success";
    }

    public function show($id)
    {
        $quis = Quis::with('questions')->find($id);
        return view('pages.quis.quis-show', compact('quis'));
    }

    public function update(Request $req, $id)
    {
        $payload = collect($req);

        $quisPayload = $payload->only(['title','logo','header']);


        $timestamps = Carbon::now()->toDateTimeString(); //Timestamps for file naming
        
        $files = $payload->only(['logo','header'/* ,'photo' */]);
        if ($req->hasFile('logo')) {
            // if (file_exists('/'.$materi->logo)) {
            //     dd('exist');
            // }
            $quisPayload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo'.$timestamps);
        }

        if ($req->hasFile('header')) {
            $quisPayload['header'] = ImageService::storeImage($req->header, 'header', 'header'.$timestamps);
        }
        $quis = Quis::with('questions.options')->find($id);

        // dd($quis);
        DB::beginTransaction();
        try {
            $quis->update($quisPayload->toArray());

            $quis->questions()->delete();
            
            foreach ($payload['questions'] as $idx => $question) {
                $q = Question::create([
                    'quis_id' => $quis->id,
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
        return redirect('/quis');
    }
    public function edit($id)
    {
        $quis = Quis::with(['questions.options'])->find($id);


        return view('pages.quis.quis-edit', compact('quis'));
    }
}
