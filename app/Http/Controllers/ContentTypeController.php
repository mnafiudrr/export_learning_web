<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentType;
class ContentTypeController extends Controller
{
    public function all()
    {
        return ContentType::all();
    }
}
