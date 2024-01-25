<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name_en
 * @property string|null $city
 * @property string|null $name_ar
 * @property string|null $name_ru
 * 
 * @property Collection|Project[] $projects
 *
 * @package App\Models
 */
class Area extends Model
{
	protected $table = 'areas';

	protected $fillable = [
		'name_en',
		'city',
		'name_ar',
		'name_ru'
	];

	public function projects()
	{
		return $this->hasMany(Project::class);
	}
        public function image(){
            return $this->img_url!=""?asset('storage/app/areas/'.$this->img_url):url('public/dist/assets/img/empty.jpg');
        }
}
