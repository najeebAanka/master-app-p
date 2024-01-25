<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DevelopersController extends Controller {


    
      function all(Request $request)
    {
        $lang_name_pref = 'name_'.$request->header('Locale');

        $data = \App\Models\Developer::select('id' ,$lang_name_pref." as name",'icon')->where('icon' ,'<>'  ,null)->limit(10)->get();
        foreach ($data  as $single) {
             $single->img_url = $single->image();
                }
        return $this->formResponse("Data retrived in ".$request->header('Locale'), $data, 200);
    }
    
    
    

}
