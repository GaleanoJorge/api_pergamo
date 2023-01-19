<?php

use App\Models\InvimaStatus;
use Illuminate\Database\Seeder;

class InvimaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/invima-status.json'));

        foreach (json_decode($data) as $row) {
            InvimaStatus::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
