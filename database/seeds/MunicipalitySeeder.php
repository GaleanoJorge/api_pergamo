<?php

use App\Models\Circuit;
use App\Models\Municipality;
use App\Models\Region;

use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/municipality.json'));

        $data1 = Circuit::all();
        $data2 = Region::all();

        foreach (json_decode($data) as $row) {
            $regionId = null;
            $circuitId = null;
            //Obtener ID generado apartir del ID del sistema anterior "sga_origin_fk"
            
            if( $row->circuit_id != null ){

                $circuit = MunicipalitySeeder::getObjectByOriginId($data1, $row->circuit_id);

                if (isset($circuit)) {
                   $circuitId = $circuit->id;
                }
               
            }

            if( $row->region_id != null ){
                $region = MunicipalitySeeder::getObjectByOriginId($data2, $row->region_id);
    
                if (isset($region)) {
                    $regionId = $region->id;
                }
            }

            Municipality::create([
                //se mantiene el id DANE del Sistema anterior
                'id' => $row->sga_origin_fk,
                'name' => $row->name,
                'region_id' => $regionId,
                'sga_origin_fk' => $row->sga_origin_fk,
            ]);
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
