<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quis;
use App\Models\Question;

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
}
