<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //elimpia la tabla de paises
        Pais::truncate();
        //arreglo de paises
        $paises = array(
            array('id' => 1, 'nombre' => "Afghanistan"),
            array('id' => 2, 'nombre' => "Albania"),
            array('id' => 3, 'nombre' => "Algeria"),
            array('id' => 4, 'nombre' => "American Samoa"),
            array('id' => 5, 'nombre' => "Andorra"),
            array('id' => 6, 'nombre' => "Angola"),
            array('id' => 7, 'nombre' => "Anguilla"),
            array('id' => 8, 'nombre' => "Antarctica"),
            array('id' => 9, 'nombre' => "Antigua And Barbuda"),
            array('id' => 10, 'nombre' => "Argentina"),
        );
        Pais::insert($paises);
    }
}
