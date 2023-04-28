<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function show() {
        $sections = Section::all();
        return $sections;
    }
    public function store(Request $request){
  
        $section = new Section();
        $section->component_name = $request['component_name'];
        $section->component_styles = $request['component_styles'];
        $section->title = $request['title'];
        $section->title_style_class = $request['title_style_class'];
        $section->description = $request['description'];
        $section->desc_style_class = $request['desc_style_class'];
        $section->image = $request['image'];
        $section->image_style_class = $request['image_style_class'];
        $section->content = $request['content'];
        $section->library_settings = $request['library_settings'];
        $section->page_id = 1;
        $section->save();
        return $section;


        
    }
}
