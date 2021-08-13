<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubMateri;
use App\Models\SubMateriContent;
use App\Models\ContentType;

use App\Http\Requests\CreateSubmateriRequest;

use Illuminate\Support\Facades\DB;

use App\Services\ImageService;
use App\Services\ContentService;

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
     
        $payload  = collect($req);

        // dd($req->all());
        if(isset($req->logo) && $req->hasFile('logo'))
        {

            $payload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo_');
        }
   
   


        DB::beginTransaction();
        $submateri =collect();
        try {
            $submateri  = SubMateri::create($payload->toArray());

            $model = new SubMateriContent;
            ContentService::saveContent($model, $payload['contents'], 'sub_materi', $submateri);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();

        return $submateri;
    }

    public function update(Request $req)
    {
        // dd($req->all());
        $submateri = SubMateri::find($req->sub_materi_id);
        if (!$submateri) {
            return 'not found';
        }

        $payload = collect($req);
        $materiContentPayload = $payload->get('contents');

        if ($req->hasFile('logo')) {
            if (file_exists('/'.$submateri->logo)) {
                dd('exist');
            }
            $payload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo');
        }

        try {
            $submateri->update($payload->toArray());
            $submateri->subMateriContents()->delete();
            $model = new SubMateriContent;
            ContentService::saveContent($model, $materiContentPayload, 'sub_materi', $submateri);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->back();
    }
    public function create(Request $req)
    {
        // dd($req->parentId);
        $parentId = $req->parentId;
        return view('pages.submateri.submateri-create', compact('parentId'));
    }

    public function show($id)
    {
        $submateri = SubMateri::with('subSubMateri')->find($id);


        return view('pages.submateri.submateri-show', compact('submateri'));
    }

    public function edit($id)
    {
        $submateri = Submateri::with('subMateriContents')->find($id);
        return view('pages.submateri.submateri-edit', compact('submateri'));
    }
}
