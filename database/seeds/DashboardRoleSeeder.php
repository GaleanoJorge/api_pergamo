<?php

use App\Models\DashboardRole;
use Illuminate\Database\Seeder;

class DashboardRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDashboardRole = file_get_contents(database_path('json/dashboard_role.json'));
        
        foreach(json_decode($jDashboardRole) as $row){
            DashboardRole::create([
                'dashboard_id' => $row->dashboard_id,
                'role_id' => $row->role_id,
            ]);
        }
    }
}
