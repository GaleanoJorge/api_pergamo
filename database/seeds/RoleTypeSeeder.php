<?php

use App\Models\RoleType;
use Illuminate\Database\Seeder;

class RoleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jRoleType = file_get_contents(database_path('json/role_type.json'));
        
        foreach(json_decode($jRoleType) as $row){
            RoleType::create([
                'name' => $row->name
            ]);
        }
    }
}
