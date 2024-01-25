<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AreasController extends Controller {


    
      function all(Request $request)
    {
        $lang_name_pref = 'name_'.$request->header('Locale');

        $data = \App\Models\Area::select('id' ,$lang_name_pref." as name",'img_url')
                ->orderBy('order_sn' ,'desc')
                ->orderBy('img_url','desc')
                ;
        $start = 0;
        if($request->get('start')){
          $start =     $request->get('start');
        }
        $data = $data->take(7)->offset($start)->get();
        
        foreach ($data  as $single) {
             $single->img_url = $single->image();
             $single->count_properties = \App\Models\Property::where('location' ,$single->name)->count();
             $single->starting_price = \App\Models\Property::where('location' ,$single->name)->min('price_aed');
             
                }
        return $this->formResponse("Data retrived in ".$request->header('Locale'), $data, 200);
    }
    
    
    

}
