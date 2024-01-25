<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Developer
 * 
 * @property int $id
 * @property string|null $name_en
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $icon
 * @property string|null $name_ar
 * @property string|null $name_ru
 * 
 * @property Collection|Project[] $projects
 *
 * @package App\Models
 */
class Developer extends Model
{
	protected $table = 'developers';

	protected $fillable = [
		'name_en',
		'icon',
		'name_ar',
		'name_ru'
	];

	public function projects()
	{
		return $this->hasMany(Project::class);
	}
        
        
            public function image(){
            return $this->icon!=""?asset('storage/app/developers/'.$this->icon):url('public/dist/assets/img/dev-placeholder.png');
        }
}
