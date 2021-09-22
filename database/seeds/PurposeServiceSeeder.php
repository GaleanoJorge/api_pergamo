<?php

use App\Models\PurposeService;
use Illuminate\Database\Seeder;

class PurposeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/purpose-service.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            PurposeService::create([
                'name' => $row->name,
            ]);
        }
    }
}
