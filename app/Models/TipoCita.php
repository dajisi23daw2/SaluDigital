<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCita extends Model
{
    protected $table = 'tipos_citas';
    protected $fillable = ['nombre'];
}
