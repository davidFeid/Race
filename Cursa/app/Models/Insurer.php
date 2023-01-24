<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Insurer
 *
 * @property $cif
 * @property $name
 * @property $address
 * @property $price
 * @property $active
 * @property $created_at
 * @property $updated_at
 *
 * @property RacetrackRecord[] $racetrackRecords
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Insurer extends Model
{
    
    static $rules = [
		'cif' => 'required',
		'name' => 'required',
		'address' => 'required',
		'price' => 'required',
		'active' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cif','name','address','price','active'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function racetrackRecords()
    {
        return $this->hasMany('App\Models\RacetrackRecord', 'insurer_cif', 'cif');
    }
    

}
