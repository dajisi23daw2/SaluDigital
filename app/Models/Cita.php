<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'usuario_id',
        'tipo',
        'estado',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
