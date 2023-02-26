<?php

namespace App\Repository;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Dingo\Api\Routing\Helpers;

class UnitsRepository
{
    public function getAll(){
        $units = Unit::all();
        return $units;
    }

    public function store(Request $request){
        $unit = new Unit();
        $unit->name = $request['unit_name'];
        $unit->unit = $request['unit_label'];
        $unit->save();
        return $unit;
    }
   
}
