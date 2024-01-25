<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;

class LocationsController extends Controller {

    function all(Request $request) {


        $start = $request->get('start') ? $request->get('start') : 0;
        $items = \App\Models\Property::select(['location'])->groupBy('location');
        if ($request->get('name')) {
            $items = $items->where('location', 'like', '%' . $request->get('name') . '%');
        }
        $items = $items->take(10)->offset($start)->get();
        $stds = [];
        foreach ($items as $i) {
            $std = new \stdClass();
            $std->id =$i->location;
            $std->text =$i->location;
            array_push($stds,$std);
        }

        $response = new stdClass();
        $response->results = $stds;
        $pagination = new stdClass();
        $pagination->more = count($stds) > 0;

        $response->pagination = $pagination;
        return response()->json($response, 200
                        , ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                        JSON_UNESCAPED_UNICODE);

//          
//       $data = \App\Models\Property::select(['location as id , location as text'])->groupBy('location')->limit(8)->get();
//        return $this->formResponse("Data retrived in ".$request->header('Locale'), $data, 200);
    }

}
