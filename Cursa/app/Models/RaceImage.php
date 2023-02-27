<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RaceImage
 *
 * @property $race_id
 * @property $race_image
 * @property $created_at
 * @property $updated_at
 *
 * @property Race $race
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RaceImage extends Model
{
    
    static $rules = [
		'race_id' => 'required',
		'race_image' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['race_id','race_image'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function race()
    {
        return $this->hasOne('App\Models\Race', 'id', 'race_id');
    }
    

}
