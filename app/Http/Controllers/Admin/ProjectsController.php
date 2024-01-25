<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ProjectsController extends Controller {

    function insert(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'name_ru' => 'required',
                    'area_id' => 'required',
                    'developer_id' => 'required',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = new \App\Models\Project();

        $item["name_en"] = $input["name_en"];
        $item["name_ar"] = $input["name_ar"];
        $item["name_ru"] = $input["name_ru"];

        $item["area_id"] = $input["area_id"];
        $item["developer_id"] = $input["developer_id"];

        $item->save();

        return back()->with('message', 'Inserted succesfully');
        ;
    }

    function update(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
                    'id' => 'required|exists:projects,id',
                        ]
        );
        if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));
            ;
        }
        $item = \App\Models\Project::find($input["id"]);
        $changes = false;

        if ($request->has("name_en")) {
            $item["name_en"] = $input["name_en"];
            $changes = true;
        }
        if ($request->has("name_ar")) {
            $item["name_ar"] = $input["name_ar"];
            $changes = true;
        }
        if ($request->has("name_ru")) {
            $item["name_ru"] = $input["name_ru"];
            $changes = true;
        }



        if ($request->has("lang")) {
            $lang = $input["lang"];

            if ($request->has("name_" . $lang)) {
                $item["name_" . $lang] = $input["name_" . $lang];
                $changes = true;
            }
            if ($request->has("description_" . $lang)) {
                $item["description_" . $lang] = $input["description_" . $lang];
                $changes = true;
            }

            for ($i = 1; $i <= 3; $i++) {
                if ($request->has("paragraph" . $i . "-title_" . $lang)) {
                    $item["paragraph" . $i . "_title_" . $lang] = $input["paragraph" . $i . "-title_" . $lang];
                    $changes = true;
                }
                if ($request->has("paragraph" . $i . "-content_" . $lang)) {
                    $item["paragraph" . $i . "_content_" . $lang] = $input["paragraph" . $i . "-content_" . $lang];
                    $changes = true;
                }
            }
        }
        //

        if ($request->has("lat")) {
            $item["lat"] = $input["lat"];
            $changes = true;
        }
        if ($request->has("lng")) {
            $item["lng"] = $input["lng"];
            $changes = true;
        }

        if ($request->has("area_id")) {
            $item["area_id"] = $input["area_id"];
            $changes = true;
        }

        if ($request->has("developer_id")) {
            $item["developer_id"] = $input["developer_id"];
            $changes = true;
        }




        if ($request->hasFile('videoFile')) {
            $fileName = md5(time()) . '.' . $request->videoFile->getClientOriginalExtension();
            $path = "projects/videos/" . date('Y') . "/" . date('m') . "/" . date('d') . "";
            $filePath = $request->file('videoFile')->storeAs($path, $fileName, 'public');
            $item->video_url = $filePath;
            $changes = true;
        }



        if ($request->hasFile('main-header-cover')) {

            $file = $request->only('main-header-cover')['main-header-cover'];
            $fileArray = array('main-header-cover' => $file);
            $rules = array(
                'main-header-cover' => 'mimes:jpg,png,jpeg|required|max:50000' // max 10000kb
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
                    if (!Storage::disk('local')->has('projects/covers/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('local')->makeDirectory('projects/covers/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }

                    Image::make($file)->resize(1920, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(storage_path('app/projects/covers/' . $name));

                    $item->cover_pic = $name;
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                }
            }
            $changes = true;
        }


        $step = 1;
        for ($i = 2; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $name_pref = "paragraph" . $i . "pic" . $j;

                // 
                //
                if ($request->hasFile($name_pref)) {
                    // die("pic found ".$request->hasFile($name_pref). " >> " . $name_pref);
                    $file = $request->only($name_pref)[$name_pref];
                    $fileArray = array($name_pref => $file);
                    $rules = array(
                        $name_pref => 'mimes:jpg,png,jpeg|required|max:50000' // max 10000kb
                    );
                    $validator = Validator::make($fileArray, $rules);
                    if ($validator->fails()) {
                        return back()->with('error', "Image validation says it is not correct");
                    } else {
                        $uniqueFileName = uniqid()
                                . '.' . $file->getClientOriginalExtension();
                        $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;

                        try {
                            if (!Storage::disk('local')->has('projects/paragraphs/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                                Storage::disk('local')->makeDirectory('projects/paragraphs/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                            }

                            Image::make($file)->resize(600, null, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })->save(storage_path('app/projects/paragraphs/' . $name));

                            $item["pic" . ($step) . "_url"] = $name;
                        } catch (Exception $r) {
                            return back()->with('error', "Failed to upload image " . $r);
                        }
                    }
                    $changes = true;
                }
                $step++;
            }
        }





        if ($request->hasFile('main-slider-cover')) {
            foreach ($request->file('main-slider-cover') as $file) {

                $uniqueFileName = uniqid()
                        . '.' . $file->getClientOriginalExtension();
                $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
                try {
                    if (!Storage::disk('local')->has('projects/slides/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                        Storage::disk('local')->makeDirectory('projects/slides/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                    }

                    Image::make($file)->resize(1600, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(storage_path('app/projects/slides/' . $name));

                    $m = new \App\Models\Medium();
                    $m->target_id = $item->id;
                    $m->lg_url = $name;
                    $m->target_type = 1; //home slider for project
                    $m->save();
                } catch (Exception $r) {
                    return back()->with('error', "Failed to upload image " . $r);
                }
            }
            $changes = true;
        }
        $item->save();

        return back()->with('message', $changes ? 'Updated succesfully' : "Nothing changed");
        ;
    }

}
