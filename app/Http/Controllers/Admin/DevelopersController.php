<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;

class DevelopersController extends Controller {

    function insert(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'name_en' => 'required',
                    'name_ru' => 'required',
                    'name_ar' => 'required',
                    'image' => 'required',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = new \App\Models\Developer();
        $item->name_en = $input["name_en"];
        $item->name_ru = $input["name_ru"];
        $item->name_ar = $input["name_ar"];
     

        if ($request->hasFile('image')) {

            $file = $request->only('image')['image'];
            $fileArray = array('image' => $file);
            $rules = array(
                'image' => 'mimes:jpg,png,jpeg|required|max:50000' // max 10000kb
            );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                return back()->with('error', "Image validation says it is not correct");
                ;
            } else {
                $uniqueFileName = uniqid()
                        . '.' . $file->getClientOriginalExtension();
                $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
                try {
                    if (!Storage::disk('local')->has('developers/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('local')->makeDirectory('developers/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    
                    Image::make($file)->resize(256, null, function ($constraint) {
                        $constraint->aspectRatio();
                         $constraint->upsize();
                    })->save(storage_path('app/developers/' . $name));
                    
                    
                    
                    $item->icon = $name;
                    $item->save();
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
            
                }
            }
        }



        $item->save();

        return back()->with('message', 'Inserted succesfully');
        ;
    }

    function update(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:developers,id',
                    'name_en' => 'required',
                    'name_ru' => 'required',
                    'name_ar' => 'required',
                 
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = \App\Models\Developer::find($input["id"]);
       $item->name_en = $input["name_en"];
        $item->name_ru = $input["name_ru"];
        $item->name_ar = $input["name_ar"];
   
        
        
            if ($request->hasFile('image')) {

            $file = $request->only('image')['image'];
            $fileArray = array('image' => $file);
            $rules = array(
                'image' => 'mimes:jpg,png,jpeg|required|max:50000' // max 10000kb
            );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                return back()->with('error', "Image validation says it is not correct");
                ;
            } else {
                $uniqueFileName = uniqid()
                        . '.' . $file->getClientOriginalExtension();
                $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
                try {
                    if (!Storage::disk('local')->has('developers/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('local')->makeDirectory('developers/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    Image::make($file)->resize(256, null, function ($constraint) {
                        $constraint->aspectRatio();
                         $constraint->upsize();
                    })->save(storage_path('app/developers/' . $name));
                    $item->icon = $name;
                   
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                    ;
                }
            }
        }

        
        $item->save();

        return back()->with('message', 'Changes saved succesfully');
        ;
    }

    function delete(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:developers,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
   
        $item = \App\Models\Developer::find($input["id"]);
        $item->delete();

        return back()->with('message',"Deleted succesfully");
        ;
    }

}
