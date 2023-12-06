<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoTarea extends Model
{
    use HasFactory;
    protected $table = 'proyecto_asigna_tarea';
    protected $fillable = ['estado'];

    public $timestamps=false;
}
