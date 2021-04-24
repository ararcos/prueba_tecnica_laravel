<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::truncate();
        $estados = array(
            array('nombre' => "Badakhshan", 'country_id' => 1),
            array('nombre' => "Badgis", 'country_id' => 1),
            array('nombre' => "Baglan", 'country_id' => 1),
            array('nombre' => "Balkh", 'country_id' => 1),
            array('nombre' => "Bamiyan", 'country_id' => 1),
            array('nombre' => "Farah", 'country_id' => 1),
            array('nombre' => "Faryab", 'country_id' => 1),
            array('nombre' => "Gawr", 'country_id' => 1),
            array('nombre' => "Gazni", 'country_id' => 1),
            array('nombre' => "Herat", 'country_id' => 1),
            array('nombre' => "Hilmand", 'country_id' => 1),
            array('nombre' => "Jawzjan", 'country_id' => 1),
            array('nombre' => "Kabul", 'country_id' => 1),
            array('nombre' => "Kapisa", 'country_id' => 1),
            array('nombre' => "Khawst", 'country_id' => 1),
            array('nombre' => "Kunar", 'country_id' => 1),
            array('nombre' => "Lagman", 'country_id' => 1),
            array('nombre' => "Lawghar", 'country_id' => 1),
            array('nombre' => "Nangarhar", 'country_id' => 1),
            array('nombre' => "Nimruz", 'country_id' => 1),
            array('nombre' => "Nuristan", 'country_id' => 1),
            array('nombre' => "Paktika", 'country_id' => 1),
            array('nombre' => "Paktiya", 'country_id' => 1),
            array('nombre' => "Parwan", 'country_id' => 1),
            array('nombre' => "Qandahar", 'country_id' => 1),
            array('nombre' => "Qunduz", 'country_id' => 1),
            array('nombre' => "Samangan", 'country_id' => 1),
            array('nombre' => "Sar-e Pul", 'country_id' => 1),
            array('nombre' => "Takhar", 'country_id' => 1),
            array('nombre' => "Uruzgan", 'country_id' => 1),
            array('nombre' => "Wardak", 'country_id' => 1),
            array('nombre' => "Zabul", 'country_id' => 1),
            array('nombre' => "Berat", 'country_id' => 2),
            array('nombre' => "Bulqize", 'country_id' => 2),
            array('nombre' => "Delvine", 'country_id' => 2),
            array('nombre' => "Devoll", 'country_id' => 2),
            array('nombre' => "Dibre", 'country_id' => 2),
            array('nombre' => "Durres", 'country_id' => 2),
            array('nombre' => "Elbasan", 'country_id' => 2),
            array('nombre' => "Fier", 'country_id' => 2),
            array('nombre' => "Gjirokaster", 'country_id' => 2),
            array('nombre' => "Gramsh", 'country_id' => 2),
            array('nombre' => "Has", 'country_id' => 2),
            array('nombre' => "Kavaje", 'country_id' => 2),
            array('nombre' => "Kolonje", 'country_id' => 2),
            array('nombre' => "Korce", 'country_id' => 2),
            array('nombre' => "Kruje", 'country_id' => 2),
            array('nombre' => "Kucove", 'country_id' => 2),
            array('nombre' => "Kukes", 'country_id' => 2),
            array('nombre' => "Kurbin", 'country_id' => 2),
            array('nombre' => "Lezhe", 'country_id' => 2),
            array('nombre' => "Librazhd", 'country_id' => 2),
            array('nombre' => "Lushnje", 'country_id' => 2),
            array('nombre' => "Mallakaster", 'country_id' => 2),
            array('nombre' => "Malsi e Madhe", 'country_id' => 2),
            array('nombre' => "Mat", 'country_id' => 2),
            array('nombre' => "Mirdite", 'country_id' => 2),
            array('nombre' => "Peqin", 'country_id' => 2),
            array('nombre' => "Permet", 'country_id' => 2),
            array('nombre' => "Pogradec", 'country_id' => 2),
            array('nombre' => "Puke", 'country_id' => 2),
            array('nombre' => "Sarande", 'country_id' => 2),
            array('nombre' => "Shkoder", 'country_id' => 2),
            array('nombre' => "Skrapar", 'country_id' => 2),
            array('nombre' => "Tepelene", 'country_id' => 2),
            array('nombre' => "Tirane", 'country_id' => 2),
            array('nombre' => "Tropoje", 'country_id' => 2),
            array('nombre' => "Vlore", 'country_id' => 2),
            array('nombre' => "'Ayn Daflah", 'country_id' => 3),
            array('nombre' => "'Ayn Tamushanat", 'country_id' => 3),
            array('nombre' => "Adrar", 'country_id' => 3),
            array('nombre' => "Algiers", 'country_id' => 3),
            array('nombre' => "Annabah", 'country_id' => 3),
            array('nombre' => "Bashshar", 'country_id' => 3),
            array('nombre' => "Batnah", 'country_id' => 3),
            array('nombre' => "Bijayah", 'country_id' => 3),
            array('nombre' => "Biskrah", 'country_id' => 3),
            array('nombre' => "Blidah", 'country_id' => 3),
            array('nombre' => "Buirah", 'country_id' => 3),
            array('nombre' => "Bumardas", 'country_id' => 3),
            array('nombre' => "Burj Bu Arririj", 'country_id' => 3),
            array('nombre' => "Ghalizan", 'country_id' => 3),
            array('nombre' => "Ghardayah", 'country_id' => 3),
            array('nombre' => "Ilizi", 'country_id' => 3),
            array('nombre' => "Jijili", 'country_id' => 3),
            array('nombre' => "Jilfah", 'country_id' => 3),
            array('nombre' => "Khanshalah", 'country_id' => 3),
            array('nombre' => "Masilah", 'country_id' => 3),
            array('nombre' => "Midyah", 'country_id' => 3),
            array('nombre' => "Milah", 'country_id' => 3),
            array('nombre' => "Muaskar", 'country_id' => 3),
            array('nombre' => "Mustaghanam", 'country_id' => 3),
            array('nombre' => "Naama", 'country_id' => 3),
            array('nombre' => "Oran", 'country_id' => 3),
            array('nombre' => "Ouargla", 'country_id' => 3),
            array('nombre' => "Qalmah", 'country_id' => 3),
            array('nombre' => "Qustantinah", 'country_id' => 3),
            array('nombre' => "Sakikdah", 'country_id' => 3),
            array('nombre' => "Satif", 'country_id' => 3),
            array('nombre' => "Sayda'", 'country_id' => 3),
            array('nombre' => "Sidi ban-al-'Abbas", 'country_id' => 3),
            array('nombre' => "Suq Ahras", 'country_id' => 3),
            array('nombre' => "Tamanghasat", 'country_id' => 3),
            array('nombre' => "Tibazah", 'country_id' => 3),
            array('nombre' => "Tibissah", 'country_id' => 3),
            array('nombre' => "Tilimsan", 'country_id' => 3),
            array('nombre' => "Tinduf", 'country_id' => 3),
            array('nombre' => "Tisamsilt", 'country_id' => 3),
            array('nombre' => "Tiyarat", 'country_id' => 3),
            array('nombre' => "Tizi Wazu", 'country_id' => 3),
            array('nombre' => "Umm-al-Bawaghi", 'country_id' => 3),
            array('nombre' => "Wahran", 'country_id' => 3),
            array('nombre' => "Warqla", 'country_id' => 3),
            array('nombre' => "Wilaya d Alger", 'country_id' => 3),
            array('nombre' => "Wilaya de Bejaia", 'country_id' => 3),
            array('nombre' => "Wilaya de Constantine", 'country_id' => 3),
            array('nombre' => "al-Aghwat", 'country_id' => 3),
            array('nombre' => "al-Bayadh", 'country_id' => 3),
            array('nombre' => "al-Jaza'ir", 'country_id' => 3),
            array('nombre' => "al-Wad", 'country_id' => 3),
            array('nombre' => "ash-Shalif", 'country_id' => 3),
            array('nombre' => "at-Tarif", 'country_id' => 3),
            array('nombre' => "Eastern", 'country_id' => 4),
            array('nombre' => "Manu'a", 'country_id' => 4),
            array('nombre' => "Swains Island", 'country_id' => 4),
            array('nombre' => "Western", 'country_id' => 4),
            array('nombre' => "Andorra la Vella", 'country_id' => 5),
            array('nombre' => "Canillo", 'country_id' => 5),
            array('nombre' => "Encamp", 'country_id' => 5),
            array('nombre' => "La Massana", 'country_id' => 5),
            array('nombre' => "Les Escaldes", 'country_id' => 5),
            array('nombre' => "Ordino", 'country_id' => 5),
            array('nombre' => "Sant Julia de Loria", 'country_id' => 5),
            array('nombre' => "Bengo", 'country_id' => 6),
            array('nombre' => "Benguela", 'country_id' => 6),
            array('nombre' => "Bie", 'country_id' => 6),
            array('nombre' => "Cabinda", 'country_id' => 6),
            array('nombre' => "Cunene", 'country_id' => 6),
            array('nombre' => "Huambo", 'country_id' => 6),
            array('nombre' => "Huila", 'country_id' => 6),
            array('nombre' => "Kuando-Kubango", 'country_id' => 6),
            array('nombre' => "Kwanza Norte", 'country_id' => 6),
            array('nombre' => "Kwanza Sul", 'country_id' => 6),
            array('nombre' => "Luanda", 'country_id' => 6),
            array('nombre' => "Lunda Norte", 'country_id' => 6),
            array('nombre' => "Lunda Sul", 'country_id' => 6),
            array('nombre' => "Malanje", 'country_id' => 6),
            array('nombre' => "Moxico", 'country_id' => 6),
            array('nombre' => "Namibe", 'country_id' => 6),
            array('nombre' => "Uige", 'country_id' => 6),
            array('nombre' => "Zaire", 'country_id' => 6),
            array('nombre' => "Other Provinces", 'country_id' => 7),
            array('nombre' => "Sector claimed by Argentina/Ch", 'country_id' => 8),
            array('nombre' => "Sector claimed by Argentina/UK", 'country_id' => 8),
            array('nombre' => "Sector claimed by Australia", 'country_id' => 8),
            array('nombre' => "Sector claimed by France", 'country_id' => 8),
            array('nombre' => "Sector claimed by New Zealand", 'country_id' => 8),
            array('nombre' => "Sector claimed by Norway", 'country_id' => 8),
            array('nombre' => "Unclaimed Sector", 'country_id' => 8),
            array('nombre' => "Barbuda", 'country_id' => 9),
            array('nombre' => "Saint George", 'country_id' => 9),
            array('nombre' => "Saint John", 'country_id' => 9),
            array('nombre' => "Saint Mary", 'country_id' => 9),
            array('nombre' => "Saint Paul", 'country_id' => 9),
            array('nombre' => "Saint Peter", 'country_id' => 9),
            array('nombre' => "Saint Philip", 'country_id' => 9),
            array('nombre' => "Buenos Aires", 'country_id' => 10),
            array('nombre' => "Catamarca", 'country_id' => 10),
            array('nombre' => "Chaco", 'country_id' => 10),
            array('nombre' => "Chubut", 'country_id' => 10),
            array('nombre' => "Cordoba", 'country_id' => 10),
            array('nombre' => "Corrientes", 'country_id' => 10),
            array('nombre' => "Distrito Federal", 'country_id' => 10),
            array('nombre' => "Entre Rios", 'country_id' => 10),
            array('nombre' => "Formosa", 'country_id' => 10),
            array('nombre' => "Jujuy", 'country_id' => 10),
            array('nombre' => "La Pampa", 'country_id' => 10),
            array('nombre' => "La Rioja", 'country_id' => 10),
            array('nombre' => "Mendoza", 'country_id' => 10),
            array('nombre' => "Misiones", 'country_id' => 10),
            array('nombre' => "Neuquen", 'country_id' => 10),
            array('nombre' => "Rio Negro", 'country_id' => 10),
            array('nombre' => "Salta", 'country_id' => 10),
            array('nombre' => "San Juan", 'country_id' => 10),
            array('nombre' => "San Luis", 'country_id' => 10),
            array('nombre' => "Santa Cruz", 'country_id' => 10),
            array('nombre' => "Santa Fe", 'country_id' => 10),
            array('nombre' => "Santiago del Estero", 'country_id' => 10),
            array('nombre' => "Tierra del Fuego", 'country_id' => 10),
            array('nombre' => "Tucuman", 'country_id' => 10),
        );
        Estado::insert($estados);
    }
}
