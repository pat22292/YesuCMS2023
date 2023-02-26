<?php

namespace App\Repository;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ClientsRepository
{
    public function getAll(){
        $clients = Client::all();
        return $clients;
    }

    public function store(Request $request){
        $client = new Client();
        $client->client_name = $request['client_name'];
        $client->description = $request['description'];
        $client->save();
        return $client;
    }
   
}
