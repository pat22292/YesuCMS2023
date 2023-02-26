<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
          return [
            'unit_name' => $this->name,
            'unit_label' => $this->unit,
            'created_at' => $this->created_at->format('m-d-Y'),
            'updated_at' => $this->updated_at->format('m-d-Y'),
        ];
    }
}
