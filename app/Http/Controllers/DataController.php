<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class DataController extends Controller {

    function generateAreaIfNotExists($name) {

        if (\App\Models\Area::where(DB::RAW('TRIM(LOWER(name_en))'), strtolower(trim($name)))->count() > 0) {
            return \App\Models\Area::where(DB::RAW('TRIM(LOWER(name_en))'), strtolower(trim($name)))->first()->id;
        }
        $item = new \App\Models\Area();
        $item->name_en = $name;
        $item->name_ru = $name;
        $item->name_ar = $name;
        $item->save();
        return $item->id;
    }

    function generateDeveloperIfNotExists($name) {

        if (\App\Models\Developer::where(DB::RAW('TRIM(LOWER(name_en))'), strtolower(trim($name)))->count() > 0) {
            return \App\Models\Developer::where(DB::RAW('TRIM(LOWER(name_en))'), strtolower(trim($name)))->first()->id;
        }
        $item = new \App\Models\Developer();
        $item->name_en = $name;
        $item->name_ru = $name;
        $item->name_ar = $name;
        $item->save();
        return $item->id;
    }

    function generateProjectIfNotExists($name, $developer, $location) {


        if (\App\Models\Project::where(DB::RAW('TRIM(LOWER(name_en))'), strtolower(trim($name)))->count() > 0) {
            return \App\Models\Project::where(DB::RAW('TRIM(LOWER(name_en))'), strtolower(trim($name)))->first()->id;
        }
        $item = new \App\Models\Project();
        $item->name_en = $name;
        $item->name_ru = $name;
        $item->name_ar = $name;
        $item->area_id = $this->generateAreaIfNotExists($location);
        $item->developer_id = $this->generateDeveloperIfNotExists($developer);
        $item->save();
        return $item->id;
    }

    function generateCategoryIfNotExists($name) {

        if (\App\Models\Category::where(DB::RAW('TRIM(LOWER(name_en))'), strtolower(trim($name)))->count() > 0) {
            return \App\Models\Category::where(DB::RAW('TRIM(LOWER(name_en))'), strtolower(trim($name)))->first()->id;
        }
        $item = new \App\Models\Category();
        $item->name_en = $name;
        $item->save();
        return $item->id;
    }

    function readExcel(Request $request) {



    //    $pics_names = Storage::disk('public')->files('properties/pics');

        $f = asset('storage/app/public/properties/convertcsv.json');
        $json = file_get_contents($f, 0, null, null);
        $json = json_decode($json, true);
        $json = $json['Sheet1'];

        $start = 120
        ;
        $page = 40;

        $step = 0;
        $added = 0;
$info = "";
        foreach ($json as $j) {
//            if ($step >= $start && $step <= ($start + $page))
            {
                $added++;

//                $list = [];
//                $j["code"] = str_pad($j["code"], 6, '0', STR_PAD_LEFT);
//                for ($i = 0; $i < count($pics_names); $i++) {
//                    $headers = explode('_', basename($pics_names[$i]));
//                    if ($headers[0] == $j["code"])
//                        $list[] = $pics_names[$i];
//                }

                $input = $j;
                 $item = new \App\Models\Property();
                 $new= 1;
                if (\App\Models\Property::where('ref', $input["reference-id"])->count() > 0)
                {
                    $item = \App\Models\Property::where('ref', $input["reference-id"])->first();
                     $info.= "<br />edited ".$item->title_en." with ".count($list)." pics <br />----<br />";
                     $new = 0;
                    
                }else{
                        $info.= "<br />adding  ".$input["name_en"]." with no pics <br />----<br />"; 
                }
           
                
                $item->ref = $input["reference-id"];
                $item->title_en = $input["name_en"];
                $item->title_ru = $input["name_en"];
                $item->title_ar = $input["name_en"];
                $item->p_level = $input["class"];

                if (!isset($input["project"]) || trim($input["project"]) == "")
                    $input["project"] = "Unknown";
                if (trim($input["location"]) == "")
                    $input["location"] = "Unknown";
                if (trim($input["developer"]) == "")
                    $input["developer"] = "Unknown";
                
                 //------------final--------------------------
                $this->generateAreaIfNotExists($input["location"]);
                $this->generateAreaIfNotExists($input["developer"]);
                $this->generateAreaIfNotExists($input["project"]);
                //--------------------------------------------
                
                
                $item->project_id = $this->generateProjectIfNotExists($input["project"], $input["developer"], $input["location"]);
                $item->category_id = $this->generateCategoryIfNotExists($input["category"]);
                $item->launch = $input["status"] ;

                $value = !isset($input["bedrooms"])?0:$input["bedrooms"];
                $int_value = ctype_digit($value) ? intval($value) : null;
                if ($int_value === null) {
                    $item->no_bedrooms = 0;
                } else
                    $item->no_bedrooms = $value;

                $value =   !isset($input["bathrooms"])?1: $input["bathrooms"];
                $int_value = ctype_digit($value) ? intval($value) : null;
                if ($int_value === null) {
                    $item->no_bathrooms = 1;
                } else
                    $item->no_bathrooms = $value;


                $item->status = $input["status"];

                $item->price_aed = $input["price_aed"];
                $item->price_usd = $input["price_aed"] * 0.27;
                $item->price_euro = $input["price_aed"] * 0.25;
                $item->area_m = $input["area_ft"] * 0.092903;
                $item->area_ft = $input["area_ft"];

                $item->rent_or_sell = $input["r_or_s"] == 's' ? "Sell" : "Rent";

                $item["description_en"] = $input["desc_en"];
                $item["description_ar"] = $input["desc_en"];
                $item["description_ru"] = $input["desc_en"];

                $item["location"] = $input["location"];
               // $item["p_view"] = $input["view"];
                $item["building"] = $input["building"];
                $item["rera"] =  isset($input["Rera Permit No"])?$input["Rera Permit No"]:"-";
                if(isset($input["VIDEO"])){
                 $item["video_url"] =   $input["VIDEO"];  
                }

                $item->save();
//                $limit = 0;
//                
//                
//                 \App\Models\Medium::where('target_id' , $item->id)
//                         ->where('target_type' ,$item->target_type)->delete();
//                 $version = 1;
//                 if($new == 1)
//                foreach ($list as $p) {
//                    if ($limit++ >= 10)
//                        break;
//
//
//                    //logic of media 
//                    $file = base_path() . '/storage/app/public/' . $p;
//                    $uniqueFileName = uniqid()
//                            . '.' . pathinfo($file, PATHINFO_EXTENSION);
//                    $name_lg = "exported/v".$version."/" . date('Y') . "/" . date("m") . "/" . date("d") . "/" . $j["code"] . "/lg_" . $uniqueFileName;
//                    $name_sm = "exported/v".$version."/" . date('Y') . "/" . date("m") . "/" . date("d") . "/" . $j["code"] . "/sm_" . $uniqueFileName;
//
//                    if (!Storage::disk('local')->has('properties/slides/exported/v'.$version."/" . date('Y') . "/" . date("m") . "/" . date("d") . "/" . $j["code"] . "/")) {
//                        Storage::disk('local')->makeDirectory('properties/slides/exported/v'.$version."/" . date('Y') . "/" . date("m") . "/" . date("d") . "/" . $j["code"] . "/");
//                    }
//
//                    if (Image::make($file)->resize(1600, null, function ($constraint) {
//                                $constraint->aspectRatio();
//                                $constraint->upsize();
//                            })->save(storage_path('app/properties/slides/' . $name_lg)) &&
//                            Image::make($file)->resize(500, null, function ($constraint) {
//                                $constraint->aspectRatio();
//                                $constraint->upsize();
//                            })->save(storage_path('app/properties/slides/' . $name_sm))) {
//
//                        //end of logic
//
//                        $m = new \App\Models\Medium();
//                        $m->target_id = $item->id;
//                        $m->lg_url = $name_lg;
//                        $m->sm_url = $name_sm;
//                        $m->target_type = 2; //pic for preoperty
//                        $m->save();
//                    } else {
//                        die("Error writing image !!");
//                    }
//                }
            }
            $step++;
       
        }
        return $this->formResponse("Added " . $added . " between " . $start . " AND " . ($start + $page),  $info, 200);
    }

    function ModifyData(Request $request) {




        $f = asset('storage/app/public/properties/convertcsv.json');
        $json = file_get_contents($f, 0, null, null);
        $json = json_decode($json, true);

        $start = 120
        ;
        $page = 40;

        $step = 0;
        $added = 0;

        foreach ($json as $j) { {
                $added++;

                $input = $j;
                if (\App\Models\Property::where('ref', $input["reference-id"])->count() > 0) {
                    $item = \App\Models\Property::where('ref', $input["reference-id"])->first();

                    $item->ref = $input["reference-id"];
                    $item->title_en = $input["name_en"];
                    $item->title_ru = $input["name_ru"];
                    $item->title_ar = $input["name_ar"];
                    $item->p_level = $input["class"];
                    if ($input["project"] == "")
                        $input["project"] = "Unknown";

                    $this->generateAreaIfNotExists($input["location"]);
                    $this->generateAreaIfNotExists($input["developer"]);
                    $this->generateAreaIfNotExists($input["project"]);

                    $item->project_id = $this->generateProjectIfNotExists($input["project"], $input["developer"], $input["location"]);
                    $item->category_id = $this->generateCategoryIfNotExists($input["category"]);
                    $item->launch = $input["laucning status"] ? $input["laucning status"] : "NEW";

                    $value = trim($input["bedrooms"]);
                    if ($value == 'Studio')
                        $value = 0;
                    $int_value = ctype_digit($value) ? intval($value) : null;
                    if ($int_value === null) {
                        $item->no_bedrooms = 0;
                    } else
                        $item->no_bedrooms = $value;



                    $value = trim($input["bathrooms"]);
                    if ($value == "") {
                        $value = 1;
                    };
                    $int_value = ctype_digit($value) ? intval($value) : null;
                    if ($int_value === null) {

                        $item->no_bathrooms = 1;
                    } else
                        $item->no_bathrooms = $value;


                    $item->status = $input["status"];

                    $item->price_aed = $input["price_aed"];
                    $item->price_usd = $input["price_aed"] * 0.27;
                    $item->price_euro = $input["price_aed"] * 0.25;
                    $item->area_m = $input["area_ft"] * 0.092903;
                    $item->area_ft = $input["area_ft"];

                    $item->rent_or_sell = $input["r_or_s"] == 's' ? "Sell" : "Rent";

                    $item["description_en"] = $input["desc_en"];
                    $item["description_ar"] = $input["desc_en"];
                    $item["description_ru"] = $input["desc_en"];

                    $item["location"] = $input["location"];
                    $item["p_view"] = $input["view"];
                    $item["building"] = $input["building"];
                    $item["rera"] = $input["Rera Permit No"];

                    $item->save();
                    echo '<br />' . $input["Rera Permit No"] . 'updated';
                }
            }
            $step++;
        }
        return $this->formResponse("Added ", null, 200);
    }

}
