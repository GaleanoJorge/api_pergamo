<?php

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/marital-status.json'));

        foreach (json_decode($data) as $row) {
            MaritalStatus::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
