<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class PagesController extends Controller {

    function insert(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'name_en' => 'required',
                    'name_ru' => 'required',
                    'name_ar' => 'required',
                    'code' => 'required',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = new \App\Models\Page();
        $item->title_en = $input["name_en"];
        $item->title_ru = $input["name_ru"];
        $item->title_ar = $input["name_ar"];
        $item->code = $input["code"];
        $item->contents_en = "";
        $item->contents_ar = "";
        $item->contents_ru = "";


        $item->save();

        return back()->with('message', 'Inserted succesfully');
        ;
    }

    function update(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:pages,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = \App\Models\Page::find($input["id"]);
        if ($request->has('name_en'))
            $item->title_en = $input["name_en"];
        if ($request->has('name_ru'))
            $item->title_ru = $input["name_ru"];
        if ($request->has('name_ar'))
            $item->title_ar = $input["name_ar"];



        if ($request->has('content_en'))
            $item->contents_en = $input["content_en"];
        if ($request->has('content_ar'))
            $item->contents_ar = $input["content_ar"];
        if ($request->has('content_ru'))
            $item->contents_ru = $input["content_ru"];
        $item->save();

        return back()->with('message', 'Changes saved succesfully');
        ;
    }

    function delete(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:pages,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }

        $item = \App\Models\Page::find($input["id"]);
        $item->delete();

        return back()->with('message', "Deleted succesfully");
        ;
    }

}
