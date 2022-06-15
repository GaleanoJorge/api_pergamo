<?php

use App\Models\ChRouteFluid;
use Illuminate\Database\Seeder;

class ChRouteFluidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_route_fluid.json'));

        foreach (json_decode($data) as $row) {
            ChRouteFluid::create([
                'id' => $row->id,
                'name' => $row->name,
                'type' => $row->type,
            ]);
        }
    }
}
