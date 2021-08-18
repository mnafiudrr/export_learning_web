<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master;

use Carbon\Carbon;

class SettingController extends Controller
{
    public function indexSetting()
    {
        $settings = Master::all();

        return view('pages.setting.setting-index', compact('settings'));
    }

    public function store(Request $request)
    {
        $settings = Master::create($request->all());
        if($request->hasFile('splash','header')){
            $request->file('splash')->move('image/',$request->file('splash')->getClientOriginalName());
            $settings->splash = $request->file('splash')->getClientOriginalName();
            $settings->save();
            $request->file('header')->move('image/',$request->file('header')->getClientOriginalName());
            $settings->header = $request->file('header')->getClientOriginalName();
            $settings->save();
        }
        return redirect('/setting');
    }

    public function create()
    {
        return view('pages.setting.setting-create');
    }

    public function hapus($id)
    {
        $settings = Master::find($id);
        $settings->delete();
        return redirect('/setting');
    }
}
