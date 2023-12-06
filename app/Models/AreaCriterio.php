<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaCriterio extends Model
{
    use HasFactory;
    protected $table = 'area_asigna_criterios';
    protected $fillable = ['id_criterio','id_area'];
    
    public $timestamps=false;

}
