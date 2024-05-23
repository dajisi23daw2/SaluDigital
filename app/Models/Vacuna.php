<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    protected $fillable = ['nombre', 'fecha', 'motivo', 'nombre_comercial', 'lote', 'centro_administracion', 'via_administracion', 'localizacion_anatomica', 'origen_informacion', 'user_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
