<?php

use App\Models\StorageConditions;
use Illuminate\Database\Seeder;

class StorageConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/storage-conditions.json'));

        foreach (json_decode($data) as $row) {
            StorageConditions::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
