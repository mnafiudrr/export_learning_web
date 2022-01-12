<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\SubSubMateri;
use App\Models\SubSubMateriContent;
use App\Models\ContentType;

use App\Services\ImageService;
use App\Services\ContentService;


use Carbon\Carbon;

class SubSubMateriController extends Controller
{
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

    public function store(Request $req)
    {
        $payload  = collect($req);
        $payload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo_');

        DB::beginTransaction();
        $subsubmateri =collect();
        try {
            $subsubmateri  = SubSubMateri::create($payload->toArray());


            $row = 1;
            foreach ($payload['contents'] as  $content) {
                $contentTypeId = ContentType::where('type', $content['content_type'])->first()->id;
                if ($content['content_type'] === 'image') {
                    $content['value'] =  ImageService::storeImage($content['value'], 'photo', 'photo');
                }
                SubSubMateriContent::create(
                    [
                        'sub_sub_materi_id' => $subsubmateri->id,
                        'content_type_id' => $contentTypeId,
                        'value' => $content['value'],
                        'row'=> $row,
                    ]
                );

                $row += 1;
            }
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->to('subsubmateri/'.$subsubmateri->id);
    }

    public function edit($id)
    {
        $ssm = SubSubMateri::with('subSubMateriContents')->find($id);

        return view('pages.subsubmateri.subsubmateri-edit', compact('ssm'));
    }
    public function update(Request $req, $id)
    {
        // dd($req->all());
        $ssm = SubSubMateri::find($req->sub_sub_materi_id);
        if (!$ssm) {
            return view('errors.404');
        }
        $payload  = collect($req);
        $materiContentPayload = $payload->get('contents');

        if ($req->hasFile('logo')) {
            if (file_exists('/'.$ssm->logo)) {
                dd('exist');
            }
            $payload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo');
        }

        DB::beginTransaction();
        $subsubmateri =collect();
        try {
            $ssm->update($payload->toArray());
            $ssm->subSubMateriContents()->delete();
            $model = new SubSubMateriContent;
            ContentService::saveContent($model, $materiContentPayload, 'sub_sub_materi', $ssm);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();

        return redirect('/subsubmateri/'. $ssm->id);
    }

    public function getSubSubMateriBySubMateriId(Request $req, $id)
    {
        $pageSize = $req->pageSize ?? 12;

        $SubSubMateris = SubSubMateri::with([
            'subSubMateriContents'
        ])->where('sub_materi_id', $id)->paginate($req->pageSize);

        return response()->json($SubSubMateris, 200);
    
        return response()->json($SubSubMateris, 200);
    }

    public function create(Request $req)
    {
        $parentId = $req->parentId;
        return view('pages.subsubmateri.subsubmateri-create', compact('parentId'));
    }

    public function show($id)
    {
        $ssm = SubSubMateri::with(['detailSsms','subSubMateriContents'])->find($id);
        if (!$ssm) {
            return 'not found';
        }
        return view('pages.subsubmateri.subsubmateri-show', compact('ssm'));
    }

    public function delete($id)
    {
        $ssm = SubSubmateri::find($id);
        $ssm->delete();
        return redirect('submateri/'. $ssm->sub_materi_id);
    }
}
