<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ContactController extends Controller {

    function send(Request $request) {

        $input = $request->all();
        
        $validator = Validator::make($input, [
                    'name' => 'required',
                    'phone' => 'required',
                    'email' => 'required',
                    'message' => 'required',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = new \App\Models\Lead();
        $item->name = $input["name"];
        $item->phone = $input["phone"];
        $item->email = $input["email"];
        $item->message = $input["message"];
        $item->source = "Website";
        $item->save();
        return back()->with('message', 'Thanks for contacting us');
        ;
    }

    function update(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:areas,id',
                    'name_en' => 'required',
                    'name_ru' => 'required',
                    'name_ar' => 'required',
                    'city' => 'required',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = \App\Models\Area::find($input["id"]);
       $item->name_en = $input["name_en"];
        $item->name_ru = $input["name_ru"];
        $item->name_ar = $input["name_ar"];
        $item->city = $input["city"];
        
        
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
                    if (!Storage::disk('local')->has('areas/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('local')->makeDirectory('areas/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }
                    Image::make($file)->resize(920, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save(storage_path('app/areas/' . $name));
                    $item->img_url = $name;
                   
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
                    'id' => 'required|exists:areas,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
   
        $item = \App\Models\Area::find($input["id"]);
        $item->delete();

   return back()->with('message',"Deleted succesfully");
        ;
    }

}
