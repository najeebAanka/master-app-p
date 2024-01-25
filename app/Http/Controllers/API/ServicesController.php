<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ServicesController extends Controller {

    
    
        
      function all(Request $request)
    {
        $lang_name_pref = 'name_'.$request->header('Locale');

        $data = \App\Models\ServiceItem::select('id' ,$lang_name_pref." as name")->limit(20)->get();
    
        return $this->formResponse("Data retrived in ".$request->header('Locale'), $data, 200);
    }
    
    
    
    }


