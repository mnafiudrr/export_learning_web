<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master;

use App\Http\Requests\CreateMasterRequest;

class MasterController extends Controller
{
    public function getAppLogo()
    {
        $BASE_LOGO_DB_NAME = 'APP_LOGO'; // Set The 'name' Column in database to fetch app logo
        $logo = Master::where('name', $BASE_LOGO_DB_NAME)->first()->value;
        
        return response()->json($logo, 200);
    }
    
    public function dashboardVideo()
    {
        $BASE_VIDEO_DB_NAME = 'APP_VIDEO'; // Set The 'name' Column in database to fetch app logo
        $video = Master::where('name', $BASE_VIDEO_DB_NAME)->first()->value;
    
        return response()->json($video, 200);
    }

    public function store(CreateMasterRequest $req)
    {
        $stored = Master::create($req);
        return response()->json([
            'message' => 'success',
            'data' => $stored
        ], 200);
    }
}
