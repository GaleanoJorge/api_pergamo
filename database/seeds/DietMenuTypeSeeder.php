<?php

use App\Models\DietMenuType;
use Illuminate\Database\Seeder;

class DietMenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietMenuType = file_get_contents(database_path('json/diet_menu_type.json'));
        
        foreach(json_decode($jDietMenuType) as $row){
            DietMenuType::create([
                'name' => $row->name
            ]);
        }
    }
}
