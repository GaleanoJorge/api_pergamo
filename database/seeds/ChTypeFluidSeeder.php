<?php

use App\Models\ChTypeFluid;
use Illuminate\Database\Seeder;

class ChTypeFluidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_type_fluid.json'));

        foreach (json_decode($data) as $row) {
            ChTypeFluid::create([
                'id' => $row->id,
                'name' => $row->name,
                'ch_route_fluid_id' => $row->ch_route_fluid_id,
            ]);
        }
    }
}
