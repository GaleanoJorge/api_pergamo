<?php

use App\Models\Inability;
use Illuminate\Database\Seeder;

class InabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/inability.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Inability::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
