<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    use HasFactory;
    protected $table = 'criterios';
    protected $primaryKey = 'id_criterio';
    protected $fillable = ['nombre_criterio'];
    
    public $timestamps=false;

    public function areas(){
        return $this->belongsToMany(Area::class,'area_asigna_criterios','id_criterio','id_area');
    }
    // public function empleados(){
    //     return $this->belongsToMany(Area::class,'criterios_califica_empleados','id_criterio','id_empleado')
    //     ->withPivot(['calificacion']);
    // }
    // public function calificaciones()
    // {
    //     return $this->hasMany(Calificacion::class,'id_criterio');
    // }
    
}
