<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $documento
 * @property $nombres
 * @property $celular
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @property Mascotum[] $mascotas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'documento' => 'required',
		'nombres' => 'required',
		'celular' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['documento','nombres','celular','correo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mascotas()
    {
        return $this->hasMany('App\Models\Mascotum', 'responsable_id', 'id');
    }
    

}
