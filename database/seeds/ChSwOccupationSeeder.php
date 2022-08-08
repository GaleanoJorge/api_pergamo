<?php

use App\Models\ChSwOccupation;
use Illuminate\Database\Seeder;

class ChSwOccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_occupation.json'));

        foreach (json_decode($data) as $row) {
            ChSwOccupation::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
