<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master;

use App\Services\ImageService;

use Carbon\Carbon;

class SettingController extends Controller
{
    public function indexSetting()
    {
        $settings = Master::all();

        return view('pages.setting.setting-index', compact('settings'));
    }

    public function store(CreateMasterRequest $req)
    {
        $payload = collect($req);

        if ($req->hasFile('splash')) {
            $payload['splash'] = ImageService::storeImage($req->splash, 'splash', 'splash');
        }

        if ($req->hasFile('header')) {
            $payload['header'] = ImageService::storeImage($req->header, 'header', 'header');
        }

        $settings = Master::create($payload->toArray());
        return redirect()->to('setting/');
    }

    public function tambah()
    {
        return view('pages.setting.setting-create');
    }
}
