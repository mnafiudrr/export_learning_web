<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ListMateri\ListMateriCollection;
use App\Http\Resources\Api\ListMateri\ListMateriResource;
use App\Http\Resources\Api\MateriDetail\MateriDetailCollection;
use App\Http\Resources\Api\MateriDetail\MateriDetailResource;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materi = Materi::get();
        $data = new ListMateriCollection($materi);
        // $data = new ListMateriResource($materi);

        // dd($data);
        return response()->json([
            'data' => $data,
            'meta' => [
                'status' => 200,
                'message' => 'Success'
            ]
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $materi = Materi::find($id);

        if (!$materi) {
            return response()->json([
                'meta' => [
                    'status' => 404,
                    'message' => 'Not Found'
                ]
            ], 404);
        }else{
            $data = new MateriDetailResource($materi);
            return response()->json([
                'data' => $data,
                'meta' => [
                    'status' => 200,
                    'message' => 'Success'
                ]
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
