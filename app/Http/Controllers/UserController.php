<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register']]);
    }
    public function register(UserRegisterRequest $req)
    {
        $user = User::create($req->toArray());
        return response()->json($req, 200);
    }
}
