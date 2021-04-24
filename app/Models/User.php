<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'nombre',
        'numero',
        'cedula',
        'fecha_nacimiento',
        'ciudad',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['edad'];

    //devuelve la edad calculada con su fecha de nacimiento
    public function getEdadAttribute()
    {
        return Carbon::parse($this->fecha_nacimiento )->age;
    }

    public function encriptarPassword(){
        $this->password =  Hash::make($this->password);
    }

    //busca registros que cumplan con el criterio de busqueda en el campo solicitado
    public function scopeBuscarpor($query,$tipo,$buscar){
        error_log('entro funcion');
        if(($tipo) && ($buscar)){
            return $query->where($tipo,'like','%'.$buscar.'%');
        }
    }
}
