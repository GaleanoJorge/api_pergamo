<?php

use App\Models\IdentificationType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/user2.json'));

        $data1 = IdentificationType::all();

        $arrData = [];
        $totalBatch = 500;
        $count = 0;
        $total = count(json_decode($data));
        Log::info('Inicia proceso de UserSeeder: ' . $count . ' de ' . $total);
        foreach (json_decode($data) as $row) {
            $count++;
            $identificationTypeId = null;
            //Obtener ID generado apartir del ID del sistema anterior "sga_origin_fk"
            if ($row->identification_type_id != null) {
                /*$identificationType = IdentificationType::where([
                    ['sga_origin_fk', $row->identification_type_id]
                ])->get();
    
                if ($identificationType->count()) {
                    $identificationTypeId = $identificationType->first()->id;
                }*/

                $identificationType = UserSeeder::getObjectByOriginId($data1, $row->identification_type_id);

                if (isset($identificationType)) {
                    $identificationTypeId = $identificationType->id;
                }
            }

            $arrData[] = [
                'id' => $row->id,
                'status_id' => $row->status_id,
                'gender_id' => $row->gender_id,
				'gender_type' => $row-> gender_type,
				'is_disability' => $row-> is_disability,
				'disability' => $row-> disability,
				'ethnicity_id' => $row-> ethnicity_id,
				'academic_level_id' => $row->academic_level_id,
                'identification_type_id' => $identificationTypeId,
                'birthplace_municipality_id' => $row->birthplace_municipality_id,
                'username' => $row->username,
                'email' => $row-> email,
                'email_verified_at' => $row-> email_verified_at,
				'password' => Hash::make($row->password),
                'firstname' => $row->firstname,
                'middlefirstname' => $row->middlefirstname,
                'lastname' => $row->lastname,
                'middlelastname' => $row->middlelastname,
                'identification' => $row->identification,
                'birthday' => $row-> birthday,
                'phone' => $row-> phone,
				'landline' => $row-> landline,
				'sync_id' => $row-> sync_id,
                'force_reset_password' => $row->force_reset_password,
                'sga_origin_fk' => $row->sga_origin_fk,
                'birthplace_country_id' => $row->birthplace_country_id,
				'birthplace_region_id'=> $row->birthplace_region_id,
				'residence_address' => $row->residence_address,
				'residence_region_id' => $row->residence_region_id,
                'residence_municipality_id' => $row->residence_municipality_id,
				'residence_country_id'  => $row->residence_country_id,
				'study_level_status_id'=> $row->study_level_status_id,
				'activities_id' => $row->activities_id,
				'locality_id' => $row-> locality_id,
				'residence_id' => $row-> residence_id,
				'neighborhood_or_residence_id' => $row->neighborhood_or_residence_id,
                'select_rh_id' => $row->select_rh_id,
                'marital_status_id' => $row->marital_status_id,
                'inability_id' => $row->inability_id,
                'population_group_id' => $row->population_group_id,
				'file' => $row-> file,
				'age' => $row-> age,
				'remember_token' => $row-> remember_token,
				'created_at' => $row-> created_at,
				'updated_at' => $row-> updated_at

            ];

            if (count($arrData) >= $totalBatch) {
                User::insert($arrData);
                //Reinicia el arreglo
                unset($arrData);
                $arrData = [];
                Log::info('Procesa: ' . $count . ' de ' . $total);
            }
        }

        if (count($arrData) > 0) {
            User::insert($arrData);
            Log::info('Procesa: ' . $count . ' de ' . $total);
        }

        Log::info('Termina proceso de UserSeeder: ' . $count . ' de ' . $total);

        //factory(User::class, 1000)->create();
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
