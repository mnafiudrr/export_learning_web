<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// Models

use App\Models\Materi;

// use App\Models\SubMateri;

class MateriController extends Controller
{
    public function index(Request $req)
    {
        $pageSize = $req->pageSize ?? 12;
        $materis = Materi::paginate($req->pageSize);

        return response()->json($materis, 200);
    }

    public function get(Request $req, $id)
    {
        $materi  = Materi::with([
            'materiContents',
            'subMateris'
            ])->find($id);

        return response()->json($materi, 200);
    }
}
