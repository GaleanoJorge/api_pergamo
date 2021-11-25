<?php

use Illuminate\Database\Seeder;
use App\Models\Curriculum;
use App\Models\Circuit;
use App\Models\Log;
use App\Models\Dependence;
use App\Models\Entity;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Office;
use App\Models\Position;
use App\Models\Region;
use App\Models\SectionalCouncil;
use App\Models\Specialty;
use App\Models\User;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/curriculum.json'));

        //$data1 = Region::all();
        $data2 = Circuit::all();
        $data3 = SectionalCouncil::all();
        $data4 = Municipality::all();
        $data5 = District::all();
        $data6 = Specialty::all();
        $data7 = Office::all();
        $data8 = Dependence::all();
        $data9 = Entity::all();
        $data10 = Position::all();

        $arrData = [];

        $totalBatch = 1000;
        $count = 0;
        $total = count(json_decode($data));
        Log::info('Inicia proceso de CurriculumSeeder: ' . $count . ' de ' . $total);
        foreach (json_decode($data) as $row) {

            $count++;

            $regionId = null;
            $circuitId = null;
            $sectionalCouncilId = null;
            $municipalityId = null;
            $districtId = null;
            $specialtyId = null;
            $officeId = null;
            $dependenceId = null;
            $entityId = null;
            $positionId = null;
            $userId = null;

            //Obtener ID generado apartir del ID del sistema anterior "sga_origin_fk"
            print_r($row);
            //El departamento se obtiene del municipio
            /*if( $row->region_id != null ){
                $region = CurriculumSeeder::getObjectByOriginId($data1, $row->region_id);
    
                if (isset($region)) {
                    $regionId = $region->id;
                }
            }*/
            if ($row->circuit_id != null) {

                $circuit = CurriculumSeeder::getObjectByOriginId($data2, $row->circuit_id);

                if (isset($circuit)) {
                    $circuitId = $circuit->id;
                }
            }
            if ($row->sectional_council_id != null) {
                $sectionalCouncil = CurriculumSeeder::getObjectByOriginId($data3, $row->sectional_council_id);

                if (isset($sectionalCouncil)) {
                    $sectionalCouncilId = $sectionalCouncil->id;
                }
            }
            if ($row->municipality_id != null) {
                $municipality = CurriculumSeeder::getObjectByOriginId($data4, $row->municipality_id);

                if (isset($municipality)) {
                    $municipalityId = $municipality->id;
                    $regionId = $municipality->region_id;
                }
            }

            if ($row->district_id != null) {
                $district = CurriculumSeeder::getObjectByOriginId($data5, $row->district_id);

                if (isset($district)) {
                    $districtId = $district->id;
                }
            }



            if ($row->specialty_id != null) {
                $specialty = CurriculumSeeder::getObjectByOriginId($data6, $row->specialty_id);

                if (isset($specialty)) {
                    $specialtyId = $specialty->id;
                }
            }

            if ($row->office_id != null) {
                $office = CurriculumSeeder::getObjectByOriginId($data7, $row->office_id);

                if (isset($$office)) {
                    $officeId = $office->id;
                }
            }

            if ($row->dependence_id != null) {
                $dependence = CurriculumSeeder::getObjectByOriginId($data8, $row->dependence_id);

                if (isset($$dependence)) {
                    $dependenceId = $dependence->id;
                }
            }

            /*if( $row->entity_id != null ){
                $entity = CurriculumSeeder::getObjectByOriginId($data9, $row->entity_id);
    
                if(isset($entity)) {
                    $entityId = $entity->id;
                }
            }*/

            if ($row->position_id != null) {
                $position = CurriculumSeeder::getObjectByOriginId($data10, $row->position_id);

                if (isset($position)) {
                    $positionId = $position->id;
                }
            }

            if ($row->user_id != null) {
                $user = User::where([
                    ['sga_origin_fk', $row->user_id]
                ])->get();

                if ($user->count()) {
                    $userId = $user->first()->id;
                }
            }

            if (isset($userId)) {
                $arrData[] = [
                    "municipality_id" => $municipalityId,
                    "circuit_id" => $circuitId,
                    "district_id" => $districtId,
                    "sectional_council_id" => $sectionalCouncilId,
                    "region_id" => $regionId,
                    "specialty_id" => $specialtyId,
                    "office_id" => $officeId,
                    "dependence_id" => $dependenceId,
                    //"entity_id" => $entityId,
                    "position_id" => $positionId,
                    "user_id" => $userId,
                    "inactive" => $row->inactive
                ];
            } else {
                Log::error('Usuario: ' . $row->user_id . ', no encontrado'); // <-- what do I put here?
            }

            if (count($arrData) >= $totalBatch) {
                Curriculum::insert($arrData);
                //Reinicia el arreglo
                unset($arrData);
                $arrData = [];
                Log::info('Procesa: ' . $count . ' de ' . $total);
            }
        }

        if (count($arrData) > 0) {
            Curriculum::insert($arrData);
        }

        Log::info('Finaliza proceso de CurriculumSeeder: ' . $count . ' de ' . $total);
    }

    public static function getObjectByOriginId($data, $sgaId)
    {
        $obj = null;
        foreach ($data as $row) {
            if ($row->sga_origin_fk == $sgaId) {
                $obj = $row;
                break;
            }
        }
        return $obj;
    }
}
