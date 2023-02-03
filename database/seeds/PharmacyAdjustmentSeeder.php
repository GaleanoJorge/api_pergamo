<?php

use App\Models\PharmacyAdjustment;
use Illuminate\Database\Seeder;

class PharmacyAdjustmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/pharmacy-adjustment.json'));

        foreach (json_decode($data) as $row) {
            PharmacyAdjustment::create([
                'name' => $row->name,
            ]);
        }
    }
}
