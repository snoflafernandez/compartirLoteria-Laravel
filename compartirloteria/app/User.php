<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $primaryKey = 'idusers';
    protected $fillable = ['dni','nombre','apellidos','email','fecha_nacimiento'];
}
