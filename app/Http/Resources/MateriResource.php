<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MateriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "number" => $this->number,
            "title" => $this->title,
            "logo" => $this->logo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'materi_contents' => $this->materiContents->transform(function($data){
                return[
                    "id" => $data->id,
                    "materi_id" => $data->materi_id,
                    "content_type_id" => $data->content_type_id,
                    "value" => $data->value,
                    "row" => $data->row,
                    "created_at" => $data->created_at,
                    "updated_at" => $data->updated_at,
                ];
            }),
            'sub_materis' => $this->subMateris->transform(function($data){
                
                return[
                    'id' => $data->id,
                    'materi_id' => $data->materi_id,
                    'number' => $data->number,
                    'title' => $data->title,
                    'logo' => $data->logo,
                    'created_at' => $data->created_at,
                    'updated_at' => $data->updated_at,
                    'sub_sub_materi' => $data->subSubMateri->transform(function($sub){
                        return[
                            "id" => $sub->id,
                            "sub_materi_id" => $sub->sub_materi_id,
                            "number" => $sub->number,
                            "title" => $sub->title,
                            "logo" => $sub->logo,
                            "created_at" => $sub->created_at,
                            "updated_at" => $sub->updated_at,
                        ];
                    })
                ];
            }),
        ];
    }
}
