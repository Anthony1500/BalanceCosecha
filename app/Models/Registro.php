<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registro extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'usuario',
        'password',
        'identificacion',
        'nombre',
        'apellido',
        'email',
        'pais',
        'provincia',
        'ciudad',
        'direccion_domicilio',
        'telefono',
        'cargo',
        'id_proyecto', 
    ];

    protected $hidden = ['password'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}
