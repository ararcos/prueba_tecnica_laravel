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

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    public function ciudad(){
        return $this->hasMany(Ciudad::class);
    }
}
