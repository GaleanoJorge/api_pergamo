<?php

use App\Models\EnterallyDiet;
use Illuminate\Database\Seeder;

class EnterallyDietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/enterally_diet.json'));
        
        foreach(json_decode($data) as $row){

            EnterallyDiet::create([
                'name' => $row->name,
            ]);
        }
    }
}
