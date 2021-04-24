<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //limpia la tabla de usuarios 
        User::truncate();
        //encripta la contraseña admin
        $password = Hash::make('admin');
        //crea el usuario admin
        User::create([
            'email'=> 'admin@admin.com',
            'password'=>$password,
            'nombre'=>'Admin',
            'numero'=>'0987654321',
            'cedula'=>'18765432123',
            'fecha_nacimiento'=>'1999-05-14',
            'ciudad'=>'Ambato',
        ]);

        //Correr seeder comando : php artisan db:seed --class=UsersTableSeeder
    }
}
