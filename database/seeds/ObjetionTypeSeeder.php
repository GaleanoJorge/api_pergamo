<?php

use App\Models\ObjetionType;
use Illuminate\Database\Seeder;

class ObjetionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jObjetionType = file_get_contents(database_path('json/objetion_type.json'));
        
        foreach(json_decode($jObjetionType) as $row){
            ObjetionType::create([
                'name' => $row->name
            ]);
        }
    }
}
