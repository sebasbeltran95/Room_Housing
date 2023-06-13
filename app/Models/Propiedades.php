<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedades extends Model
{
    use HasFactory;
    protected $table = 'reservas';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'nombres',
        'apellidos',
        'piso',
        'habitacion',
        'inicio_contrato',
        'fin_contrato',
        'created_at',
        'updated_at'
    ];
}
