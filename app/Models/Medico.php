<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Informe;


class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'dni', 'email', 'password', 'especialidad_id'
    ];

    /**
     * Verifica si el médico tiene permisos de gestión de informes.
     *
     * @return bool
     */
    public function puedeGestionarInformes()
    {
        return true;
    }

    /**
     * Agrega un nuevo informe médico.
     *
     * @param array $datos
     * @return Informe
     */
    public function agregarInforme(array $datos)
    {
        return $this->informes()->create($datos);
    }

    /**
     * Edita un informe médico existente.
     *
     * @param int $id
     * @param array $datos
     * @return Informe|null
     */
    public function editarInforme($id, array $datos)
    {
        $informe = $this->informes()->find($id);

        if ($informe) {
            $informe->update($datos);
            return $informe;
        }

        return null;
    }

    /**
     * Elimina un informe médico.
     *
     * @param int $id
     * @return bool
     */
    public function eliminarInforme($id)
    {
        $informe = $this->informes()->find($id);

        if ($informe) {
            return $informe->delete();
        }

        return false;
    }

    /**
     * Define la relación con los informes médicos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function informes()
    {
        return $this->hasMany(Informe::class);
    }
}
