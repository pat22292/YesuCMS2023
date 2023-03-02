<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Cloudinary\Cloudinary;

class MenuController extends Controller
{

    protected $cloudinary;
    public function __construct(){
        $this->cloudinary = new Cloudinary(env('CLOUDINARY_URL'));
    }


    public function show() {
        $sections = Menu::all();
        return $sections;
        // return  json_encode($sections, true) ;
    }



    
    public function edit($id, Request $request){

    

        $attachedFile;
        $uploadedImage;

        $attachedFile = $request->file('select_file');

        if ($attachedFile != null) {
            $uploadedImage = $this->cloudinary->uploadApi()->upload($attachedFile->getRealPath());
        }
        
        $menu = Menu::find($id);
        $menu->image = $attachedFile ? $uploadedImage['public_id'] : null;
        $menu->save();

        
        return $menu;
      
    }
}
