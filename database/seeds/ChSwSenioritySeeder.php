<?php

use App\Models\ChSwSeniority;
use Illuminate\Database\Seeder;

class ChSwSenioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_seniority.json'));

        foreach (json_decode($data) as $row) {
            ChSwSeniority::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
