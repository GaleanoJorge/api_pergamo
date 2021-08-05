<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jStatus = file_get_contents(database_path('json/status.json'));
        
        foreach(json_decode($jStatus) as $row){
            Status::create([
                'name' => $row->name
            ]);
        }
    }
}
