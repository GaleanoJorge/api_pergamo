<?php

use App\Models\ChPsSpeed;
use Illuminate\Database\Seeder;

class ChPsSpeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_speed.json'));

        foreach (json_decode($data) as $row) {
            ChPsSpeed::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
