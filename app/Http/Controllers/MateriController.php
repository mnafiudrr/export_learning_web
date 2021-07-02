<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMateriRequest;

// Models

use App\Models\Materi;
use App\Models\MateriContent;

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


        $payload['number'] = 1; // Dummy

        $timestamps = Carbon::now()->toDateTimeString(); //Timestamps for file naming
        
        $files = $payload->only(['logo','header','photo']);


        /* Current file naming : {filetype}_{timestamps} */

        foreach ($files as $key => $value) {
            /* Magic Code to store images */
            $payload[$key] = ImageService::storeImage($value, $key, $key.$timestamps);
        }



        $materiPayload = $payload->except(['video_link','photo','isi_paragraf']);
        $materiContentPayload = $payload->only(['video_link','photo','isi_paragraf']);


        DB::beginTransaction();
        $materi = collect();
        try {
            $materi = Materi::create($materiPayload->toArray());

            foreach ($materiContentPayload as $key => $value) {
                if ($key === 'isi_paragraf') {
                    $row = 1;

                    foreach ($value  as  $paragraf) {
                        # code...
                        MateriContent::create([
                            'materi_id' => $materi->id,
                            'content_type_id' => 1, //text
                            'value' => $paragraf,
                            'row' => $row
                            ]);

                        $row += 1;
                    }
                } else {
                    MateriContent::create([
                        'materi_id' => $materi->id,
                         'content_type_id' => 1,
                         'value' => $value,
                         'row' => 1
                    ]);
                }
            }
            // $materiContents  =
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();
        return $materi;
    }

    public function indexMateri()
    {
        return view('materi');
    }

    public function create()
    {
        return view('materi-create');
    }

    public function show($id)
    {
        return view('materi-show');
    }

    public function edit($id)
    {
        return view('materi-edit');
    }
}
