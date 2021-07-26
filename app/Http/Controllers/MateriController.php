<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMateriRequest;

// Models

use App\Models\Materi;
use App\Models\MateriContent;
use App\Models\ContentType;

use Illuminate\Support\Facades\DB;

use App\Services\ImageService;
use Carbon\Carbon;

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
    public function store(CreateMateriRequest $req)
    {
        $payload = collect($req);
        $materiContentPayload = $payload->get('contents');




        $payload['number'] = 1; // Dummy

        $timestamps = Carbon::now()->toDateTimeString(); //Timestamps for file naming
        
        $files = $payload->only(['logo','header'/* ,'photo' */]);


        /* Current file naming : {filetype}_{timestamps} */

        foreach ($files as $key => $value) {
            /* Magic Code to store images */
            $payload[$key] = ImageService::storeImage($value, $key, $key.$timestamps);
        }



        $materiPayload = $payload->except(['video_link','photo','isi_paragraf']);
        $materiContentPayload = $payload->get('contents');



        DB::beginTransaction();
        $materi = collect();
        try {
            $materi = Materi::create($materiPayload->toArray());

            $row = 1;
            foreach ($materiContentPayload as $content) {
                $contentTypeId = ContentType::where('type', $content['content_type'])->first()->id;
                if ($content['content_type'] === 'image') {
                    $content['value'] =  ImageService::storeImage($content['value'], 'photo', 'photo'.$timestamps);
                }
                MateriContent::create(
                    [
                        'materi_id' => $materi->id,
                        'content_type_id' => $contentTypeId,
                        'value' => $content['value'],
                        'row' => $row
                        ]
                );
                $row++;
            }
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();
        return $materi;
    }

    public function indexMateri()
    {
        $materis = Materi::all();
        return view('materi', compact('materis'));
    }

    public function create()
    {
        $contentTypes = ContentType::all();
        return view('materi-create', compact('contentTypes'));
    }

    public function show($id)
    {
        $materi = Materi::with('subMateris')->find($id);
        return view('materi-show', compact('materi'));
    }

    public function edit($id)
    {

        $materi = Materi::with('materiContents')->find($id);
        $contentTypes = ContentType::all();
        return view('materi-edit',['materi' => $materi, 'contentTypes' => $contentTypes]);
    }
}
