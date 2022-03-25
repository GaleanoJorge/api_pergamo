<?php

use App\Models\DietComponent;
use Illuminate\Database\Seeder;

class DietComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDietComponent = file_get_contents(database_path('json/diet_component.json'));
        
        foreach(json_decode($jDietComponent) as $row){
            DietComponent::create([
                'name' => $row->name,
                'description' => $row->description
            ]);
        }
    }
}
