<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubMateri;

class SubMateriController extends Controller
{
    //

    public function index(Request $req)
    {
        $pageSize = $req->pageSize ?? 12;
        $subMateris = SubMateri::paginate($req->pageSize);

        return response()->json($subMateris, 200);
    }

    public function get(Request $req, $id)
    {
        $submateri = Submateri::with([
            'materi',
            'subMateriContents',
            'subSubMateri'
        ])->find($id);
        return response()->json($submateri, 200);
    }

    public function getSubMateriByMateriId(Request $req, $materiId)
    {
        $pageSize = $req->pageSize ?? 12;

        $submateris = SubMateri::with([
            'subMateriContents'
        ])->where('materi_id', $materiId)->paginate($pageSize);

        return response()->json($submateris, 200);
    }

    public function create()
    {
        return view('submateri-create');
    }

    public function show($id)
    {
        return view('submateri-show');
    }

    public function edit($id)
    {
        return view('submateri-edit');
    }
}
