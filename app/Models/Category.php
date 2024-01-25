<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $name_ru
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Property[] $properties
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';

	protected $fillable = [
		'name_en',
		'name_ar',
		'name_ru'
	];

	public function properties()
	{
		return $this->hasMany(Property::class, 'p_type');
	}
}
