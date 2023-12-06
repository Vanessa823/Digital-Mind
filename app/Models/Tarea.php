<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tareas';
    protected $primaryKey = 'id_tarea';
    protected $fillable = ['descripcion'];
    
    public $timestamps=false;

    public function proyectos(){
        return $this->belongsToMany(Proyecto::class,'proyecto_asigna_tarea','id_tarea','id_proyecto')->withPivot('estado');
    }
}
