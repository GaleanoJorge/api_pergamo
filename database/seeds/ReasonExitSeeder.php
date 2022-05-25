<?php

use App\Models\ReasonExit;
use Illuminate\Database\Seeder;

class ReasonExitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jReasonExit = file_get_contents(database_path('json/reason-exit.json'));
        
        foreach(json_decode($jReasonExit) as $row){
            ReasonExit::create([
                'name' => $row->name
            ]);
        }
    }
}
