<?php

use App\Models\ChPsAttitude;
use Illuminate\Database\Seeder;

class ChPsAttitudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_attitude.json'));

        foreach (json_decode($data) as $row) {
            ChPsAttitude::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
