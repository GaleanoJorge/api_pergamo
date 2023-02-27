<?php

use App\Models\DietDay;
use Illuminate\Database\Seeder;

class OxigenAdministrationWaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietDay = file_get_contents(database_path('json/oxigen_administration_way.json'));
        
        foreach(json_decode($jDietDay) as $row){
            DietDay::create([
                'name' => $row->name
            ]);
        }
    }
}
