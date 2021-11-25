<?php

use App\Models\StatusBed;
use Illuminate\Database\Seeder;

class StatusBedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/status_bed.json'));

        foreach (json_decode($data) as $row) {
            StatusBed::create([
                'name' => $row->name,
            ]);
        }
    }
}
