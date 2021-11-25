<?php

use App\Models\AdmissionRoute;
use Illuminate\Database\Seeder;

class AdmissionRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/admission_route.json'));

        foreach (json_decode($data) as $row) {
            AdmissionRoute::create([
                'id' => $row->id,
                'name' => $row->name,
            ]);
        }
    }
}
