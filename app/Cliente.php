<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';
	protected $table = 'clientes';
	protected $fillable = ['nombre','apppaterno','apmaterno','fechanac','calle','numext','colonia','cp','ciudad','estado','estudiorealizar'];

	public $timestamps = false;

	public function estudio()
    {
        return $this->belongsTo('App\Estudio','estudiorealizar');
    }
}
