<?php

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/user_role2.json'));

        $arrData = [];

        $totalBatch = 1000;
        $count = 0;
        $total = count(json_decode($data));
        Log::info('Inicia proceso de UserRoleSeeder: ' . $count . ' de ' . $total);

        foreach (json_decode($data) as $row) {
            $count++;
            $userId = null;
            //Obtener ID generado apartir del ID del sistema anterior "sga_origin_fk"
            print_r($row);
            if ($row->user_id != null) {
                $user = User::where([
                    ['sga_origin_fk', $row->user_id]
                ])->get();

                if ($user->count()) {
                    $userId = $user->first()->id;
                }
            }
            //Verifica que el existe el user Id
            if (isset($userId)) {
                $arrData[] = [
                    'user_id' =>  $userId,
                    'role_id' => $row->role_id,
                ];
            } else {
                Log::error('Usuario: ' . $row->user_id . ', no encontrado'); // <-- what do I put here?
            }

            if (count($arrData) >= $totalBatch) {
                UserRole::insert($arrData);
                //Reinicia el arreglo
                unset($arrData);
                $arrData = [];
                Log::info('Procesa: ' . $count . ' de ' . $total);
            }
        }

        if (count($arrData) > 0) {
            UserRole::insert($arrData);
            Log::info('Procesa: ' . $count . ' de ' . $total);
        }

        Log::info('Finaliza proceso de UserRoleSeeder: ' . $count . ' de ' . $total);
    }
}
