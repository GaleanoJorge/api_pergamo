<?php

use App\Models\IdentificationType;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/patients.json'));

        $data1 = IdentificationType::all();

        $arrData = [];
        $totalBatch = 500;
        $count = 0;
        $aaa = json_decode($data);
        $total = count(json_decode($data));
        Log::info('Inicia proceso de PatientsSeeder: ' . $count . ' de ' . $total);
        foreach (json_decode($data) as $row) {
            $count++;
            $identificationTypeId = null;
            //Obtener ID generado apartir del ID del sistema anterior "sga_origin_fk"
            // if ($row->identification_type_id != null) {
            //     /*$identificationType = IdentificationType::where([
            //         ['sga_origin_fk', $row->identification_type_id]
            //     ])->get();
    
            //     if ($identificationType->count()) {
            //         $identificationTypeId = $identificationType->first()->id;
            //     }*/

            //     // $identificationType = PatientsSeeder::getObjectByOriginId($data1, $row->identification_type_id);

            //     // if (isset($identificationType)) {
            //     //     $identificationTypeId = $identificationType->id;
            //     // }
            // }

            $arrData[] = [
                'id' => $row->id,
                'status_id' => $row->status_id,
                'gender_id' => $row->gender_id,
                'is_disability' => $row-> is_disability,
                'disability' => $row-> disability,
                'academic_level_id' => $row->academic_level_id,
                'identification_type_id' => $row->identification_type_id,
                //'birthplace_municipality_id' => $row->birthplace_municipality_id,
                'email' => $row->email,
                'firstname' => $row->firstname,
                'middlefirstname' => $row->middlefirstname,
                'lastname' => $row->lastname,
                'middlelastname' => $row->middlelastname,
                'identification' => $row->identification,
                'birthday' => $row->birthday,
                'phone' => $row->phone,
                'landline' => $row->landline,
                'birthplace_country_id' => $row->birthplace_country_id,
                'birthplace_region_id'=> $row->birthplace_region_id,
                'residence_address' => $row->residence_address,
                'residence_region_id' => $row->residence_region_id,
                'residence_municipality_id' => $row->residence_municipality_id,
                'residence_country_id' => $row->residence_country_id,
                'study_level_status_id'=> $row->study_level_status_id,
                'locality_id' => $row->locality_id,
                'residence_id' => $row->residence_id,
                'neighborhood_or_residence_id' => $row->neighborhood_or_residence_id,
                'population_group_id' => $row->population_group_id,
                'age' => $row->age,
            ];

            if (count($arrData) >= $totalBatch) {
                Patient::insert($arrData);
                //Reinicia el arreglo
                unset($arrData);
                $arrData = [];
                Log::info('Procesa: ' . $count . ' de ' . $total);
            }
        }

        if (count($arrData) > 0) {
            Patient::insert($arrData);
            Log::info('Procesa: ' . $count . ' de ' . $total);
        }

        Log::info('Termina proceso de PatientsSeeder: ' . $count . ' de ' . $total);

        //factory(Patient::class, 1000)->create();
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
