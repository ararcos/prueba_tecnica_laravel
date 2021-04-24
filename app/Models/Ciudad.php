<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudades';

    protected $fillable=[
        'nombre',
        'state_id'
    ];

    //relacion de ciudad pertenece a un estado
    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
