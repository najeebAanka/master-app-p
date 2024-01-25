<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertiesController extends Controller {

    function all(Request $request) {
        $lang_name_pref = 'title_' . $request->header('Locale');
        $data = \App\Models\Property::select('id', $lang_name_pref . " as name", "rent_or_sell", "price_usd", "price_aed", "price_euro",
                        "no_bedrooms", "no_bathrooms", "area_m", "area_ft", "location", "launch" ,"p_level" ,"ref","is_featured");

        if (isset($_GET['target']) && $_GET['target'] == 'rent') {
            $data = $data->where('rent_or_sell', 'rent');
        }
        if (isset($_GET['target']) && $_GET['target'] == 'sell') {
            $data = $data->where('rent_or_sell', 'sell');
        }

        
          if (isset($_GET['term'])) {
              $term = $_GET['term'];
            $data = $data->where(function ($query) use ($term) {
                $query->orWhere('ref', $term);
                $query->orWhere('p_view', $term);
                $query->orWhere('building', $term);
                $query->orWhere('location', $term);
                   
            });
        }

        
        
        if (isset($_GET['min_price_aed'])) {
            $data = $data->where('price_aed', '>=', $_GET['min_price_aed']);
        }
        if (isset($_GET['max_price_aed'])) {
            $data = $data->where('price_aed', '<=', $_GET['max_price_aed']);
        }
        if (isset($_GET['min_price_usd'])) {
            $data = $data->where('price_usd', '>=', $_GET['min_price_usd']);
        }
        if (isset($_GET['max_price_usd'])) {
            $data = $data->where('price_usd', '<=', $_GET['max_price_usd']);
        }
        if (isset($_GET['min_area_ft'])) {
            $data = $data->where('area_ft', '>=', $_GET['min_area_ft']);
        }
        if (isset($_GET['max_area_ft'])) {
            $data = $data->where('area_ft', '<=', $_GET['max_area_ft']);
        }
        if (isset($_GET['min_area_m'])) {
            $data = $data->where('area_m', '>=', $_GET['min_area_m']);
        }
        if (isset($_GET['max_area_m'])) {
            $data = $data->where('area_m', '<=', $_GET['max_area_m']);
        }
  if (isset($_GET['featured'])) {
            $data = $data->where('is_featured', '1');
        }
        if (isset($_GET['type'])) {
            $data = $data->where('rent_or_sell', $_GET['type']);
        }
        if (isset($_GET['location']) && $_GET['location']!="-1") {
            $data = $data->where('location', $_GET['location']);
        }
          if (isset($_GET['location']) && $_GET['location']!="-1") {
            $data = $data->where('location', $_GET['location']);
        }

        if (isset($_GET['category'])) {
         
            $all = $_GET['category'];
            $data = $data->where(function ($query) use ($all) {
                foreach ($all as $a)
                    $query->orWhere('category_id', $a);
            });
        }
            if (isset($_GET['bedrooms'])) {
         
            $all = $_GET['bedrooms'];
            $data = $data->where(function ($query) use ($all) {
                foreach ($all as $a)
                {
                    if($a!='+3')
                    $query->orWhere('no_bedrooms', $a);
                    else
                       $query->orWhere('no_bedrooms','>=' ,3);
                    
                }
            });
        }
        if (isset($_GET['class'])) {
         
            $all = $_GET['class'];
            $data = $data->where(function ($query) use ($all) {
                foreach ($all as $a)
                    $query->orWhere('p_level', $a);
            });
        }



        $data = $data->limit(12)->orderBy('is_featured' ,'DESC')->orderBy('price_aed')->get();
        foreach ($data as $single) {
          $single->launch =   $single->is_featured ? 'Featured': $single->launch ;
             $single->image = $single->media();

            $single->price_usd = number_format($single->price_usd, 0);
            $single->price_euro = number_format($single->price_euro, 0);
            $single->price_aed = number_format($single->price_aed, 0);

            $single->area_m = number_format($single->area_m, 0);
            $single->area_ft = number_format($single->area_ft, 0);
            if($single->no_bedrooms == 0) $single->no_bedrooms = 'Studio';
        }
        return $this->formResponse("Data retrived in " . $request->header('Locale'), $data, 200);
    }

}
