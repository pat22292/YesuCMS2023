<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'id' => $this->id,
            'service_name' => $this->service_name,
            'description' => $this->description,
            'unit_measurement' => $this->unit_measurement,
            'unit_label' => $this->unit->unit,
            'client_rate' => $this->client_rate,
            'client_id' => $this->client->id,
            'client_name' => $this->client->client_name,
            'worker_rate' => $this->worker_rate,
            'created_at' => $this->created_at->format('m-d-Y'),
            'updated_at' => $this->updated_at->format('m-d-Y'),
            'user_id' => $this->user_id
        ];
    }
}
