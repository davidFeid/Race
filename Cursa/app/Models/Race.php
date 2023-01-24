<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Race
 *
 * @property $id
 * @property $description
 * @property $ramp
 * @property $max_participants
 * @property $km
 * @property $date
 * @property $hour
 * @property $starting_point
 * @property $maps_image
 * @property $promotional_poster
 * @property $sponsor_price
 * @property $active
 * @property $created_at
 * @property $updated_at
 *
 * @property Raceimage $raceimage
 * @property RacetrackRecord[] $racetrackRecords
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Race extends Model
{
    
    static $rules = [
		'description' => 'required',
		'ramp' => 'required',
		'max_participants' => 'required',
		'km' => 'required',
		'date' => 'required',
		'hour' => 'required',
		'starting_point' => 'required',
		'maps_image' => 'required',
		'promotional_poster' => 'required',
		'sponsor_price' => 'required',
		'active' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description','ramp','max_participants','km','date','hour','starting_point','maps_image','promotional_poster','sponsor_price','active'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function raceimage()
    {
        return $this->hasOne('App\Models\Raceimage', 'race_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function racetrackRecords()
    {
        return $this->hasMany('App\Models\RacetrackRecord', 'race_id', 'id');
    }
    

}