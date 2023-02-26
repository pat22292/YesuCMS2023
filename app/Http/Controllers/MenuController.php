<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function show() {
        $sections = Menu::all();
        return $sections;
        // return  json_encode($sections, true) ;
    }
}
