<?php

use App\Models\SuppliesStatus;
use Illuminate\Database\Seeder;

class SuppliesStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jStatus = file_get_contents(database_path('json/supplies_status.json'));
        
        foreach(json_decode($jStatus) as $row){
            SuppliesStatus::create([
                'id' => $row->id,
                'name' => $row->name
            ]);
        }
    }
}
