<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    protected $fillable = ['numero','numero_sorteo','serie','fraccion','precio','fecha_sorteo','participacion_user','foto_delante','foto_detras','groups_idgroups'];
}
