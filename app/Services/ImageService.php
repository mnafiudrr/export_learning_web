<?php
namespace App\Services;

use Carbon\Carbon;
class ImageService
{
    public static function storeImage($img, String $path, String $fileName): String
    {
        $timestamps = Carbon::now()->format('Y-m-d H_i_s'); //Timestamps for file naming

        $path = $img->storeAs('public/'.$path, $fileName. $timestamps . '.'.$img->extension());
        return $path;
    }
}
