<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = 'id_area';
    protected $fillable = ['nombre_area'];
    
    public $timestamps=false;

    public function criterios(){
        return $this->belongsToMany(Criterio::class,'area_asigna_criterios','id_area','id_criterio');
    }
    // public function empleados(){
    //     return $this->belongsToMany(Empleado::class,'criterios_califica_empleados','id_area','id_empleado');
    // }
    public function periodos()
    {
        return $this->belongsTo(Periodo::class,'criterios_califica_empleados','id_area','id_periodo');
    }
    // public function calificaciones()
    // {
    //     return $this->hasMany(Calificacion::class,'id_area');
    // }

}
