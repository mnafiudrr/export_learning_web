<?php

namespace App\Http\Resources\Api\ListMateri;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ListMateriCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function ($data) {
            return (new ListMateriResource($data));
        });
        return parent::toArray($request);
    }
}
