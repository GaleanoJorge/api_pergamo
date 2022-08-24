<?php

use App\Models\Factory;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jFactory = file_get_contents(database_path('json/factory.json'));
        
        foreach(json_decode($jFactory) as $row){
            Factory::create([
                'id' => $row->id,
                'name' => $row->name,
                'status_id' => $row->status_id,
            ]);
        }
    }
}