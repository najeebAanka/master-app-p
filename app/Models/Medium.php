<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medium
 * 
 * @property int $id
 * @property int|null $property_id
 * @property string|null $sm_url
 * @property string|null $lg_url
 * @property int|null $order_sn
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Property|null $property
 *
 * @package App\Models
 */
class Medium extends Model
{
	protected $table = 'media';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
	
		'order_sn' => 'int'
	];

	protected $fillable = [
		
		'sm_url',
		'lg_url',
		'order_sn'
	];


            public function lg(){
                if($this->target_type==1)
                return $this->lg_url!=""?asset('storage/app/projects/slides/'.$this->lg_url):"";
                  if($this->target_type==2)
                return $this->lg_url!=""?asset('storage/app/properties/slides/'.$this->lg_url):"";
                return "";
        }    
               public function sm(){
                 if($this->target_type==1)
                return $this->lg_url!=""?asset('storage/app/projects/slides/'.$this->sm_url):"";
                  if($this->target_type==2)
                return $this->lg_url!=""?asset('storage/app/properties/slides/'.$this->sm_url):"";
                return "";
        }    
        
        
        
        
}
