<?php

namespace App\Repository;

use App\Models\Service;
use App\Models\Restriction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Dingo\Api\Routing\Helpers;

class ServicesRepository
{
    public function getAll(){
        $services = Service::all();
        return $services;
    }
    public function getByUserID(Request $request){
        $uID = $request['id'];
        $restriction = [];
        $restriction = Restriction::where('user_id', $uID)->get(['client_id']);
        $services = Service::whereIn('client_id', $restriction)
        ->orderBy('client_id')
        ->get();
        return $services;
    }
    public function store(Request $request){
        $service = new Service();
        $service->user_id = $request['user_id'];
        $service->client_id = $request['client_id'];
        $service->service_name = $request['service_name'];
        $service->description = $request['description'];
        $service->unit_measurement = $request['unit_measurement'];
        $service->client_rate = $request['client_rate'];
        $service->worker_rate = $request['worker_rate'];
        $service->save();
        return $service;
    }
   
}
