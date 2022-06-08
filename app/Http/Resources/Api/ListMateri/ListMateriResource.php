<?php

namespace App\Http\Resources\Api\ListMateri;

use Illuminate\Http\Resources\Json\JsonResource;

class ListMateriResource extends JsonResource
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
            'title' => $this->title,
            'logo' => $this->logo,
            'header' => $this->header,
            'number' => $this->number,
        ];
    }
}
