<?php

use App\Models\BodyRegion;
use Illuminate\Database\Seeder;

class BodyRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/body-region.json'));

        foreach (json_decode($data) as $row) {
            BodyRegion::create([
                'id' => $row->id,
                'name' => $row->name,
            ]);
        }
    }
}
