<?php

use App\Models\ChAssChestSymmetry;
use Illuminate\Database\Seeder;

class ChAssChestSymmetrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch-ass-chest-symmetry.json'));

        foreach (json_decode($data) as $row) {
            ChAssChestSymmetry::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
