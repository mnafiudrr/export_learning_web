<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Services\ContentService;

use App\Models\DetailSsm;
use App\Models\DetailSsmContent;

use Carbon\Carbon;
class DetailSsmController extends Controller
{
    //

    public function store(Request $req)
    {
     
        $payload  = collect($req);

    
   


        DB::beginTransaction();
        $detailSsm =collect();
        try {
            $detailSsm  = DetailSsm::create($payload->toArray());

            $model = new DetailSsmContent;
            ContentService::saveContent($model, $payload['contents'], 'detail_ssm', $detailSsm);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();

        return redirect()->to('detailssm/'.$detailSsm->id);

    }
    

    public function update(Request $req)
    {
        // dd($req->all());
        $detailSsm = DetailSsm::find($req->sub_materi_id);
        if (!$detailSsm) {
            return 'not found';
        }

        $payload = collect($req);
        $materiContentPayload = $payload->get('contents');

        if ($req->hasFile('logo')) {
            if (file_exists('/'.$detailSsm->logo)) {
                dd('exist');
            }
            $payload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo');
        }

        try {
            $detailSsm->update($payload->toArray());
            $detailSsm->detailSsmContents()->delete();
            $model = new DetailSsmContent;
            ContentService::saveContent($model, $materiContentPayload, 'detail_ssm', $detailSsm);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->to('detailssm/'.$detailSsm->id);
    }    
    
    public function create(Request $req)
    {

        $parentId = $req->parentId;
        return view('pages.detailssm.detailssm-create', ['parentId' => $parentId]);
    }

    public function show($id)
    {
        $detailSsm = DetailSsm::with('detailSsmContents.contentType')->find($id);


        // dd($detailSsm->detailSsmContents[0]->contentType);
        if(!$detailSsm)
        {
            return "not found";
        }

        return view('pages.detailssm.detailssm-show', compact('detailSsm'));
    }

    public function edit($id)
    {
        $submateri = DetailSsm::with('detailSsmContents.contentType')->find($id);
        return view('pages.detailssm.detailssm-edit', compact('submateri'));
    }
}
