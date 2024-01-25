<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;

class PropertiesController extends Controller {

    function insert(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'name_en' => 'required',
                    'name_ru' => 'required',
                    'name_ar' => 'required',
                    'project_id' => 'required',
                    'category_id' => 'required',
                    'level' => 'required',
                    'launch' => 'required',
                    'no_bedrooms' => 'required',
                    'no_bathrooms' => 'required',
                    'status' => 'required',
                    'price_aed' => 'required',
                    'price_usd' => 'required',
                    'price_euro' => 'required',
                    'area_m' => 'required',
                    'area_ft' => 'required',
                    'rent_or_sell' => 'required',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = new \App\Models\Property();
        $item->title_en = $input["name_en"];
        $item->title_ru = $input["name_ru"];
        $item->title_ar = $input["name_ar"];
        $item->p_level = $input["level"];

        $item->project_id = $input["project_id"];
        $item->category_id = $input["category_id"];
        $item->launch = $input["launch"];
        $item->no_bedrooms = $input["no_bedrooms"];
        $item->no_bathrooms = $input["no_bathrooms"];
        $item->status = $input["status"];

        $item->price_aed = $input["price_aed"];
        $item->price_usd = $input["price_usd"];
        $item->price_euro = $input["price_euro"];
        $item->area_m = $input["area_m"];
        $item->area_ft = $input["area_ft"];

        $item->rent_or_sell = $input["rent_or_sell"];

        $item->save();

        return back()->with('message', 'Inserted succesfully');
        ;
    }

    function update(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:properties,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = \App\Models\Property::find($input["id"]);

        if ($request->has("name_en")) {
            $item["title_en"] = $input["name_en"];
        }
        if ($request->has("name_ar")) {
            $item["title_ar"] = $input["name_ar"];
        }
        if ($request->has("name_ru")) {
            $item["title_ru"] = $input["name_ru"];
        }



        if ($request->has("description_en")) {
            $item["description_en"] = $input["description_en"];
        }
        if ($request->has("description_ar")) {
            $item["description_ar"] = $input["description_ar"];
        }
        if ($request->has("description_ru")) {
            $item["description_ru"] = $input["description_ru"];
        }






        if ($request->has("level")) {
            $item["p_level"] = $input["level"];
        }


        if ($request->has("project_id")) {
            $item["project_id"] = $input["project_id"];
        }


        if ($request->has("category_id")) {
            $item["category_id"] = $input["category_id"];
        }


        if ($request->has("launch")) {
            $item["launch"] = $input["launch"];
        }


        if ($request->has("no_bedrooms")) {
            $item["no_bedrooms"] = $input["no_bedrooms"];
        }


        if ($request->has("no_bathrooms")) {
            $item["no_bathrooms"] = $input["no_bathrooms"];
        }


        if ($request->has("status")) {
            $item["status"] = $input["status"];
        }


        if ($request->has("price_aed")) {
            $item["price_aed"] = $input["price_aed"];
        }

        if ($request->has("price_usd")) {
            $item["price_usd"] = $input["price_usd"];
        }

        if ($request->has("price_euro")) {
            $item["price_euro"] = $input["price_euro"];
        }


        if ($request->has("area_m")) {
            $item["area_m"] = $input["area_m"];
        }
        if ($request->has("area_ft")) {
            $item["area_ft"] = $input["area_ft"];
        }


        if ($request->has("rent_or_sell")) {
            $item["rent_or_sell"] = $input["rent_or_sell"];
        }




        if ($request->has("lat")) {
            $item["lat"] = $input["lat"];
        }
        if ($request->has("lng")) {
            $item["lng"] = $input["lng"];
        }

        if ($request->hasFile('main-slider-cover')) {
            foreach ($request->file('main-slider-cover') as $file) {

                $uniqueFileName = uniqid()
                        . '.' . $file->getClientOriginalExtension();
                $name_lg = date('Y') . "/" . date("m") . "/" . date("d") . "/lg_" . $uniqueFileName;
                $name_sm = date('Y') . "/" . date("m") . "/" . date("d") . "/sm_" . $uniqueFileName;
                try {
                    if (!Storage::disk('local')->has('properties/slides/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('local')->makeDirectory('properties/slides/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }

                    Image::make($file)->resize(1600, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(storage_path('app/properties/slides/' . $name_lg));

                    Image::make($file)->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(storage_path('app/properties/slides/' . $name_sm));

                    $m = new \App\Models\Medium();
                    $m->target_id = $item->id;
                    $m->lg_url = $name_lg;
                    $m->sm_url = $name_sm;
                    $m->target_type = 2; //pic for preoperty
                    $m->save();
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                }
            }
        }


        if ($request->hasFile('videoFile')) {
            $fileName = md5(time()) . '.' . $request->videoFile->getClientOriginalExtension();
            $path = "properties/videos/" . date('Y') . "/" . date('m') . "/" . date('d') . "";
            $filePath = $request->file('videoFile')->storeAs($path, $fileName, 'public');
            $item->video_url = $filePath;
        }



        $item->save();

        return back()->with('message', 'Changes saved succesfully');
        ;
    }

    function delete(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:properties,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }

        $item = \App\Models\Property::find($input["id"]);
        $item->delete();

        return back()->with('message', "Deleted succesfully");
        ;
    }

}
