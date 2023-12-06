<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table = 'periodos';
    protected $primaryKey = 'id_periodo';
    protected $fillable = ['mes', 'estatus'];
    
    public $timestamps=false;

    public function empleados(){
        return $this->belongsToMany(Empleado::class,'criterios_califica_empleados','id_periodo','id_empleado')
                    ->withPivot(['calificacion']);
    }
    public function areas(){
        return $this->hasMany(Area::class,'criterios_califica_empleados','id_periodo');
    }
    // public function calificaciones()
    // {
    //     return $this->hasMany(Calificacion::class,'id_periodo');
    // }
}
