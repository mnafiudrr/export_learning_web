<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Services\ImageService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function indexSetting()
    {
        $settings = Master::all();

        return view('pages.setting.setting-index', compact('settings'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->setting as $index => $setting) {
                if (is_file($setting['value'])) {
                    $setting['value'] = ImageService::storeImage($setting['value'], 'settings', 'setting-' .$setting['desc']);
                }
                
                $master = Master::where('name', 'LIKE', '%'.$setting['name'].'%')->first();
                $master->value = $setting['value'];
                $master->save();
            }
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
        DB::commit();
    
        return redirect('/setting');
    }

    public function create()
    {
        $settings = Master::all();
        return view('pages.setting.setting-create', compact('settings'));
    }

    public function hapus($id)
    {
        $settings = Master::find($id);
        $settings->delete();
        return redirect('/setting');
    }
}
