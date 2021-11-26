<?php

use App\Models\RepeatedInitial;
use Illuminate\Database\Seeder;

class RepeatedInitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jRepeatedInitial = file_get_contents(database_path('json/repeated_initial.json'));
        
        foreach(json_decode($jRepeatedInitial) as $row){
            RepeatedInitial::create([
                'name' => $row->name
            ]);
        }
    }
}
