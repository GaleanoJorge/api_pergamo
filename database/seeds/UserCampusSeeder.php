<?php

use App\Models\UserCampus;
use Illuminate\Database\Seeder;

class UserCampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jStatus = file_get_contents(database_path('json/user_campus.json'));
        
        foreach(json_decode($jStatus) as $row){
            UserCampus::create([
                'user_id' => $row->user_id,
                'campus_id' => $row->campus_id
            ]);
        }
    }
}
