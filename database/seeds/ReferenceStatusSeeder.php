<?php

use App\Models\ReferenceStatus;
use Illuminate\Database\Seeder;

class ReferenceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jReferenceStatus = file_get_contents(database_path('json/reference_status.json'));
        
        foreach(json_decode($jReferenceStatus) as $row){
            ReferenceStatus::create([
                'name' => $row->name
            ]);
        }
    }
}
