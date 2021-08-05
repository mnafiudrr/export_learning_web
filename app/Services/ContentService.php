<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use App\Models\ContentType;
use App\Services\ImageService;
use Carbon\Carbon;

class ContentService
{
    /*
     *
     *  Saves Content for a model  Embracing DRY Concepts :D
     *
     * */
    public static function saveContent(Model $model, array $payload, String $entity, $parent): void
    {
        $row = 1;
        $timestamps = Carbon::now()->toDateTimeString(); //Timestamps for file naming

        foreach ($payload as $content) {
            $contentTypeId = ContentType::where('type', $content['content_type'])->first()->id;
            if ($content['content_type'] === 'image' && is_file($content['value'])) {
                $content['value'] =  ImageService::storeImage($content['value'], 'photo', 'photo'.$timestamps);
            }

            if ($content['content_type'] === 'doc' && is_file($content['value'])) {
                $content['value'] =  ImageService::storeImage($content['value'], 'doc', 'doc'.$timestamps);
            }
            
            $model->create(
                [
                    $entity . '_id' => $parent->id,
                    'content_type_id' => $contentTypeId,
                    'value' => $content['value'],
                    'row' => $row
                    ]
            );
            $row++;
        }
    }
}
