<?php

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRole2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jStatus = file_get_contents(database_path('json/user_role2.json'));
        
        foreach(json_decode($jStatus) as $row){
            UserRole::create([
                'user_id' => $row->user_id,
                'role_id' => $row->role_id
            ]);
        }
    }
}
