<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProjectsController extends Controller {

    
    
        
      function all(Request $request)
    {
        $lang_name_pref = 'name_'.$request->header('Locale');

        $data = \App\Models\Project::select('id' ,$lang_name_pref." as name" ,'pic1_url','pic2_url','pic3_url','pic4_url','pic5_url','pic6_url' ,'area_id')
             ;
       
        
           $start = 0;
        if($request->get('start')){
          $start =     $request->get('start');
        }
           if($request->has('developer')){
          $data   =     $data ->where('developer_id' ,$request->get('developer'));
        }
        
        $data = $data->take(7)->offset($start)->orderBy('pic6_url' ,'desc')->get();
        
        
        foreach ($data  as $single) {
          
             $single->thumbnail = $single->pic(6);
             $single->count_properties = \App\Models\Property::where('project_id' ,$single->id)->count();
             $single->starting_price = "12,000,000 AED";
             $single->location = \App\Models\Area::find($single->area_id)->$lang_name_pref;
             
                }
        return $this->formResponse("Data retrived in ".$request->header('Locale'), $data, 200);
    }
    
    
    
    }


