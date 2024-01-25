<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * 
 * @property int $id
 * @property string|null $name_en
 * @property int|null $developer_id
 * @property int|null $area_id
 * @property string|null $description_en
 * @property string|null $cover_pic
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * @property string|null $name_ar
 * @property string|null $name_ru
 * @property string|null $description_ar
 * @property string|null $description_ru
 * 
 * @property Area|null $area
 * @property Developer|null $developer
 * @property Collection|Property[] $properties
 *
 * @package App\Models
 */
class Project extends Model
{
	protected $table = 'projects';

	protected $casts = [
		'developer_id' => 'int',
		'area_id' => 'int'
	];

	protected $fillable = [
		'name_en',
		'developer_id',
		'area_id',
		'description_en',
		'cover_pic',
		'name_ar',
		'name_ru',
		'description_ar',
		'description_ru'
	];

	public function area()
	{
		return $this->belongsTo(Area::class);
	}

	public function developer()
	{
		return $this->belongsTo(Developer::class);
	}

        
//           public function s(index){
//             
//                return $this->lg_url!=""?asset('storage/app/projects/slides/'.$this->lg_url):"";
//             
//        }    
//           
        
        
	public function properties()
	{
		return $this->hasMany(Property::class);
	}
        
            public function video(){
            return $this->video_url!=""?asset('storage/app/public/'.$this->video_url):"";
        }
           public function cover(){
            return $this->cover_pic!=""?asset('storage/app/projects/covers/'.$this->cover_pic):url('public/dist/assets/img/empty.jpg');
        }
        
           public function pic($index){
               
               $name = "pic".$index."_url";
            return $this->$name!=""?asset('storage/app/projects/paragraphs/'.$this->$name ):url('public/dist/assets/img/empty.jpg');
        }
        
        
           
        
        
}
