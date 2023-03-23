<?php

use App\Models\LaboratoryStatus;
use Illuminate\Database\Seeder;

class LaboratoryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/laboratory_status.json'));

        foreach (json_decode($data) as $row) {
            LaboratoryStatus::create([
                'name' => $row->name,
            ]);
        }
    }
}
