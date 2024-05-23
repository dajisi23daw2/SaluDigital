<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicacion extends Model
{
        protected $table = 'medicaciones';

    protected $fillable = [
        'nombre',
        'descripcion',
        'detalles',
        'fecha_inicio',
        'fecha_fin',
        'activo',
        'usuario_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
