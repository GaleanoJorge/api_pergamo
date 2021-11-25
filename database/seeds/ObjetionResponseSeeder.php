<?php

use App\Models\ObjetionResponse;
use Illuminate\Database\Seeder;

class ObjetionResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jObjetionResponse = file_get_contents(database_path('json/objetion_type.json'));
        
        foreach(json_decode($jObjetionResponse) as $row){
            ObjetionResponse::create([
                'name' => $row->name
            ]);
        }
    }
}
