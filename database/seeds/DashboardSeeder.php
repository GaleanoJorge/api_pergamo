<?php

use App\Models\Dashboard;
use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jDashboard = file_get_contents(database_path('json/dashboard.json'));
        
        foreach(json_decode($jDashboard) as $row){
            Dashboard::create([
                'name' => $row->name,
                'link' => $row->link,
            ]);
        }
    }
}
