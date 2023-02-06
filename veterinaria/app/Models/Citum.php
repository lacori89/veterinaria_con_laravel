<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Citum
 *
 * @property $id
 * @property $fecha
 * @property $mascota_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Mascotum $mascotum
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Citum extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'mascota_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','mascota_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mascotum()
    {
        return $this->hasOne('App\Models\Mascotum', 'id', 'mascota_id');
    }
    

}
