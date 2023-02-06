<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mascotum
 *
 * @property $id
 * @property $responsable_id
 * @property $identificacion
 * @property $nombre
 * @property $tipomascota_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Citum[] $citas
 * @property Cliente $cliente
 * @property Tipomascotum $tipomascotum
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mascotum extends Model
{
    
    static $rules = [
		'responsable_id' => 'required',
		'identificacion' => 'required',
		'nombre' => 'required',
		'tipomascota_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['responsable_id','identificacion','nombre','tipomascota_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function citas()
    {
        return $this->hasMany('App\Models\Citum', 'mascota_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'responsable_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipomascotum()
    {
        return $this->hasOne('App\Models\Tipomascotum', 'id', 'tipomascota_id');
    }
    

}
