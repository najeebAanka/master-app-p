<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class ServicesController extends Controller {

    function insert(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'name_en' => 'required',
                    'name_ru' => 'required',
                    'name_ar' => 'required',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = new \App\Models\ServiceItem();
        $item->name_en = $input["name_en"];
        $item->name_ru = $input["name_ru"];
        $item->name_ar = $input["name_ar"];

        $item->save();

        return back()->with('message', 'Inserted succesfully');
        ;
    }

    function update(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:services,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = \App\Models\ServiceItem::find($input["id"]);
        if ($request->has('name_en'))
            $item->name_en = $input["name_en"];
        if ($request->has('name_ru'))
            $item->name_ru = $input["name_ru"];
        if ($request->has('name_ar'))
            $item->name_ar = $input["name_ar"];



        if ($request->has('content_en'))
            $item->content_en = $input["content_en"];
        if ($request->has('content_ar'))
            $item->content_ar = $input["content_ar"];
        if ($request->has('content_ru'))
            $item->content_ru = $input["content_ru"];
        $item->save();

        return back()->with('message', 'Changes saved succesfully');
        ;
    }

    function delete(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:services,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }

        $item = \App\Models\ServiceItem::find($input["id"]);
        $item->delete();

        return back()->with('message', "Deleted succesfully");
        ;
    }

}
