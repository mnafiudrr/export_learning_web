<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\SubSubMateri;
use App\Models\SubSubMateriContent;
use App\Models\ContentType;

use App\Services\ImageService;


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
        $timestamps = Carbon::now()->toDateTimeString(); //Timestamps for file naming
        $payload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo_'.$timestamps);

        DB::beginTransaction();
        $subsubmateri =collect();
        try {
            $subsubmateri  = SubSubMateri::create($payload->toArray());


            $row = 1;
            foreach ($payload['contents'] as  $content) {
                $contentTypeId = ContentType::where('type', $content['content_type'])->first()->id;
                if ($content['content_type'] === 'image') {
                    $content['value'] =  ImageService::storeImage($content['value'], 'photo', 'photo'.$timestamps);
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

        return $subsubmateri;
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
        $ssm = SubSubMateri::with('subSubMateriContents')->find($id);
        if (!$ssm) {
            return 'not found';
        }
        return view('pages.subsubmateri.subsubmateri-show', compact('ssm'));
    }
}
