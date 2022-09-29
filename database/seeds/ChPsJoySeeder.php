<?php

use App\Models\ChPsJoy;
use Illuminate\Database\Seeder;

class ChPsJoySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_joy.json'));

        foreach (json_decode($data) as $row) {
            ChPsJoy::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
