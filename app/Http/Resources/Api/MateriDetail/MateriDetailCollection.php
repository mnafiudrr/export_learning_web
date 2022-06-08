<?php

namespace App\Http\Resources\Api\MateriDetail;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MateriDetailCollection extends ResourceCollection
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
            return (new MateriDetailResource($data));
        });
        return parent::toArray($request);
    }
}
