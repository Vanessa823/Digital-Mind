<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $table = 'criterios_califica_empleados';
    protected $fillable = [
        'id_empleado',
        'id_periodo',
        'id_area',
        'id_criterio',
        'calificacion'];
    
    public $timestamps=false;

    // public function empleado()
    // {
    //     return $this->belongsTo(Empleado::class,'id_empleado');
    // }

    // public function periodo()
    // {
    //     return $this->belongsTo(Periodo::class,'id_periodo');
    // }

    // public function area()
    // {
    //     return $this->belongsTo(Area::class,'id_area');
    // }

    // public function criterio()
    // {
    //     return $this->belongsTo(Criterio::class,'id_criterio');
    // }
}

