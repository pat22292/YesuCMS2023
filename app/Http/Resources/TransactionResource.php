<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date = date_create($this->date);
          return [
           // 'created_at' => $this->created_at->addDays(1)->toDateTimeString(),
           'id' => $this->id,
           'created_at' => $this->date,
           'created_at_formatted' => date_format($date,'m/d/Y'),
           'description' => $this->description,
           'shift' => $this->shift,
           'user' => $this->user->user_id,
           'Service' => $this->service->service_name,
           'service_id' => $this->service->id,
           'quantity' => number_format($this->quantity, 2, '.', ''),
           'Unit' => $this->unit->name,
           'rate_per_ton' => $this->service->client_rate,
           'rate_per_ton_worker' => $this->service->worker_rate,
           'total_amount' => number_format($this
                             ->unitMeasurement($this->unit->name,  $this->quantity)
                             * $this->service->client_rate, 2, '.', ''),
           'total_amount_workers' => number_format($this
                           ->unitMeasurement($this->unit->name,  $this->quantity)
                             * $this->service->worker_rate, 2, '.', ''), 
           'remarks' => $this->remarks,
           'client_id' => $this->client->client_name,
           'total_formatted' => $this->formatNumber($this->unit->name,  $this->quantity * $this->service->client_rate),
           'qty_formatted' => number_format($this->quantity, 2, '.', ',')     
           // 'restrictions' => ['client_id' => $this->restriction->client_id] ,
           // 'date' => $this->date
           // 'service_category' => $this->service->service_name
        ];
    }
}
