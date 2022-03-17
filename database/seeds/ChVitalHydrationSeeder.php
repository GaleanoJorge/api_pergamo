<?php

use App\Models\ChVitalHydration;
use Illuminate\Database\Seeder;

class ChVitalHydrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/vital_hydration.json'));

        foreach (json_decode($data) as $row) {
            ChVitalHydration::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
