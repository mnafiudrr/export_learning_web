<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMateriRequest;
use App\Http\Requests\UpdateMateriRequest;

// Models

use App\Models\Materi;
use App\Models\MateriContent;
use App\Models\ContentType;

use Illuminate\Support\Facades\DB;

use App\Services\ImageService;
use App\Services\ContentService;

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

        
        $files = $payload->only(['logo','header'/* ,'photo' */]);


        /* Current file naming : {filetype}_{timestamps} */

        foreach ($files as $key => $value) {
            /* Magic Code to store images */
            $payload[$key] = ImageService::storeImage($value, $key, $key);
        }



        $materiPayload = $payload->except(['video_link','photo','isi_paragraf']);
        $materiContentPayload = $payload->get('contents');



        DB::beginTransaction();
        $materi = collect();
        try {
            $materi = Materi::create($materiPayload->toArray());
            $model = new MateriContent;

            ContentService::saveContent($model, $materiContentPayload, 'materi', $materi);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->to('materi/'.$materi->id);
    }

    public function update(UpdateMateriRequest $req)
    {
        $materi = Materi::find($req->materi_id);

        if (!$materi) {
            return 'not found';
        }

        $payload = collect($req);
        $materiContentPayload = $payload->get('contents');

        if ($req->hasFile('logo')) {
            dd('emang file ?');

            if (file_exists('/'.$materi->logo)) {
                dd('exist');
            }
            $payload['logo'] = ImageService::storeImage($req->logo, 'logo', 'logo');
        }

        if ($req->hasFile('header')) {
            $payload['header'] = ImageService::storeImage($req->header, 'header', 'header');
        }

        DB::beginTransaction();

        try {
            $materi->update($payload->toArray());
            $materi->materiContents()->delete();
            $model = new MateriContent;
            ContentService::saveContent($model, $materiContentPayload, 'materi', $materi);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->to('materi/'.$materi->id);

        /* Current file naming : {filetype}_{timestamps} */

       

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
        return view('pages.materi.materi-create', compact('contentTypes'));
    }

    public function show($id)
    {
        $materi = Materi::with('subMateris')->find($id);
        return view('pages.materi.materi-show', compact('materi'));
    }

    public function edit($id)
    {
        $materi = Materi::with('materiContents')->find($id);
        $contentTypes = ContentType::all();
        return view('pages.materi.materi-edit', ['materi' => $materi, 'contentTypes' => $contentTypes]);
    }
}
