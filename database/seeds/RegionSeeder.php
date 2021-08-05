<?php

use App\Models\Base\Country;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/region.json'));

        $countries = Country::all();
        $arrData = [];
        foreach (json_decode($data) as $row) {

            //Obtener ID generado apartir del ID del sistema anterior "sga_origin_fk"
            /*$country = Country::where([
                ['sga_origin_fk', $row->country_id]
            ])->get();*/

            $country = RegionSeeder::getObjectByOriginId($countries, $row->country_id);

            if (!isset($country)) {
                throw new Exception('No existe ese país para la región', 423);
            }
            $countryId = $country->id;

            $arrData[] = [
                'code' => $row->code,
                'name' => $row->name,
                'country_id' => $countryId,
                'sga_origin_fk' => $row->sga_origin_fk,
            ];
            
        }
        if(count($arrData) > 0 ){
            Region::insert($arrData);
        }
    }

    public static function getObjectByOriginId($data, $sgaId){
        $obj = null;
        foreach ($data as $row) {
            if( $row->sga_origin_fk == $sgaId){
                $obj = $row;
                break;
            }
        }
        return $obj;
    }
}
