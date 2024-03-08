<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Proyecto extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id_proyecto';
    
    protected $fillable = [
        'nombre_proyecto',
        'ruc',
        'socios',
        'pais',
        'provincia',
        'ciudad',
        'direccion_proyecto',
        'area_terreno',
        'numero_plantas_arandanos',
        'numero_plantas_fresas',
        'coordenadas',
    ];
}
