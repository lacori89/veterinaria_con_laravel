<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipomascotum
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Mascotum[] $mascotas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipomascotum extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mascotas()
    {
        return $this->hasMany('App\Models\Mascotum', 'tipomascota_id', 'id');
    }
    

}
