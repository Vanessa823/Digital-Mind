<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $fillable = ['nombre_empleado','puesto','email', 'telefono'];
    
    public $timestamps=false;

    public function proyectos(){
        return $this->belongsToMany(Proyecto::class,'empleado_asignar_proyecto','id_empleado','id_proyecto');
    }
    public function periodos(){
        return $this->belongsToMany(Periodo::class,'criterios_califica_empleados','id_empleado','id_periodo')
                    ->withPivot(['calificacion']);
    }
    // public function areas(){
    //     return $this->belongsToMany(Area::class,'criterios_califica_empleados','id_empleado','id_area');
    // }
    // public function periodos(){
    //     return $this->belongsToMany(Periodo::class,'criterios_califica_empleados','id_empleado','id_periodo');
    // }
    
    // public function criterios(){
    //     return $this->belongsToMany(Criterio::class,'criterios_califica_empleados','id_empleado','id_criterio')
    //     ->withPivot(['calificacion']);
    // }
    // public function calificaciones()
    // {
    //     return $this->hasMany(Calificacion::class,'id_empleado');
    // }
}
