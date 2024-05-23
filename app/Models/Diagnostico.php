<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{


    protected $fillable = [
        'problema_salud',
        'centro',
        'fecha',
        'activo',
        'usuario_id',
    ];
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
