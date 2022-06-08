<?php

namespace App\Http\Resources\Api\MateriDetail;

use Illuminate\Http\Resources\Json\JsonResource;

class MateriDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     'id' => $this->id,
        // ];
        return [
            'id' => $this->id,
            'title' => $this->title,
            'logo' => $this->logo,
            'header' => $this->header,
            'number' => $this->number,
            'contents' => $this->orderContents('row','asc')->transform(function ($data) {
                return [
                    'content_type_id' => $data->content_type_id,
                    'value' => $data->value,
                    'row' => $data->row,
                ];
            }),
            'sub_materis' => $this->orderSubs()->transform(function ($data) {
                return [
                    'id' => $data->id,
                    'title' => $data->title,
                    'contents' => $data->orderContents('row','asc')->transform(function ($data) {
                        return [
                            'content_type_id' => $data->content_type_id,
                            'value' => $data->value,
                            'row' => $data->row,
                        ];
                    }),
                    'sub' => $this->orderSubs()->transform(function ($data) {
                        return [
                            'id' => $data->id,
                            'title' => $data->title,
                            'logo' => $data->logo,
                        ];
                    }),
                ];
            }),
        ];
    }
}
