<?php
namespace App\Services;

class ImageService
{
    public static function storeImage($img, String $path, String $fileName): String
    {
        $path = $img->storeAs('public/'.$path, $fileName.'.'.$img->extension());
        return $path;
    }
}
