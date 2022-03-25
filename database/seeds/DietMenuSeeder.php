<?php

use App\Models\DietMenu;
use Illuminate\Database\Seeder;

class DietMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietMenu = file_get_contents(database_path('json/diet_menu.json'));
        
        foreach(json_decode($jDietMenu) as $row){
            DietMenu::create([
                'name' => $row->name,
                'diet_consistency_id' => $row->diet_consistency_id,
                'diet_component_id' => $row->diet_component_id,
                'diet_menu_type_id' => $row->diet_menu_type_id,
                'diet_week_id' => $row->diet_week_id,
                'diet_day_id' => $row->diet_day_id,
            ]);
        }
    }
}
