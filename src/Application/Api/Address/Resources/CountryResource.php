<?php

namespace Application\Api\Address\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'image' => $this->image,
            'status' => $this->status,
            'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}