<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * 
 * @property int $id
 * @property int|null $p_type
 * @property string|null $p_level
 * @property int|null $project_id
 * @property string|null $title_en
 * @property string|null $launch
 * @property int|null $no_bedrooms
 * @property int|null $no_bathrooms
 * @property string|null $location
 * @property string|null $status
 * @property float|null $price
 * @property float|null $area
 * @property int|null $area_unit
 * @property int|null $price_unit
 * @property int|null $is_ultra_luxury
 * @property float|null $lat
 * @property float|null $lng
 * @property string|null $description_ar
 * @property string|null $plan_img
 * @property string|null $tour_3d_url
 * @property string|null $video
 * @property string|null $aminities
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $description_en
 * @property string|null $description_ru
 * @property string|null $title_ar
 * @property string|null $title_ru
 * 
 * @property Category|null $category
 * @property Project|null $project
 * @property Collection|Medium[] $media
 *
 * @package App\Models
 */
class Property extends Model {

    protected $table = 'properties';

    
    public function p_level(){
     if($this->p_level == 'Affordable')return trans('home.affordable');  
     if($this->p_level == 'Luxury')return trans('home.luxury');  
     if($this->p_level == 'Ultra-Luxury')return trans('home.ultra_luxury');  
    }
    
    public function video() {
        return $this->video_url;
        //   return $this->video_url!=""?asset('storage/app/public/'.$this->video_url):"";
    }

    public function media() {

        if (\Illuminate\Support\Facades\Storage::disk('local')->has('properties/slides/uploaded/' . $this->ref . '/0.jpg'))
            return asset('storage/app/properties/slides/uploaded/' . $this->ref . "/0.jpg");
        else
            return url('public/dist/assets/img/empty.jpg');


//            
//            $p= Medium::where('target_type' ,2)->where('target_id' ,$this->id)->first();
//        if($p)
//		return $p->sm();
//        else
//            return url('public/dist/assets/img/empty.jpg');
    }

}
