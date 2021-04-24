<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'country_id'
    ];

    //relacion de un estado pertenece a un pais
    public function pais(){
        return $this->belongsTo(Pais::class);
    }
    //relacion un estado tiene muchas ciudades
    public function ciudad(){
        return $this->hasMany(Ciudad::class);
    }
}
