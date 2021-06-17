<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubSubMateri;

class SubSubMateriController extends Controller
{
    //


    public function index(Request $req)
    {
        $pageSize = $req->pageSize ?? 12;
        $subSubMateris = SubSubMateri::paginate($req->pageSize);

        return response()->json($subSubMateris, 200);
    }

    public function get(Request $req, $id)
    {
        $subSubMateris = SubSubMateri::with([
            'subMateri',
            'subSubMateriContents.contentType',
        ])->find($id);
        return response()->json($subSubMateris, 200);
    }

    public function getSubSubMateriBySubMateriId(Request $req, $id)
    {
        $pageSize = $req->pageSize ?? 12;

        $SubSubMateris = SubSubMateri::with([
            'subSubMateriContents'
        ])->where('sub_materi_id', $id)->paginate($req->pageSize);

        return response()->json($SubSubMateris, 200);
    }
}
