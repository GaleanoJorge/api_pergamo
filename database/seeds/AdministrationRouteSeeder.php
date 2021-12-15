<?php

use App\Models\AdministrationRoute;
use Illuminate\Database\Seeder;

class AdministrationRouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/administration-route.json'));

        foreach (json_decode($data) as $row) {
            AdministrationRoute::create([
               
                'name' =>  $row->name,
            ]);
        }
    }
}
