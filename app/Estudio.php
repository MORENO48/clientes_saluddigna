<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $primaryKey = 'id';
	protected $table = 'estudios';
	protected $fillable = ['nombre','precio'];

	public $timestamps = false;
}
