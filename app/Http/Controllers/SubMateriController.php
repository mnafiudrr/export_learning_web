<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubMateri;
use App\Models\SubMateriContent;

use App\Http\Requests\CreateSubmateriRequest;

use Illuminate\Support\Facades\DB;

use App\Services\ImageService;

use Carbon\Carbon;

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


    public function store(Request $req)
    {
        $timestamps = Carbon::now()->toDateTimeString(); //Timestamps for file naming
     
        $payload  = collect($req);
        $payload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo_'.$timestamps);
   
   


        DB::beginTransaction();
        $submateri =collect();
        try {
            $submateri  = SubMateri::create($payload->toArray());


            foreach ($payload['isi_paragraf'] as $key => $paragraf) {
                $row = 1;
                SubMateriContent::create([
                    'sub_materi_id' => $submateri->id,
                    'content_type_id' => 1,
                    'value' => $paragraf,
                    'row'=> $key+1,
                ]);

                $row += 1;
            }
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();

        return $submateri;
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
