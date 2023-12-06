<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    protected $fillable = ['nombre_proyecto','fecha_inicio','fecha_entrega', 'avance'];
    
    public $timestamps=false;

    public function empleados(){
        return $this->belongsToMany(Empleado::class,'empleado_asignar_proyecto','id_proyecto','id_empleado');
    }

    public function tareas(){
        return $this->belongsToMany(Tarea::class,'proyecto_asigna_tarea','id_proyecto','id_tarea')->withPivot('estado');
    }

}
