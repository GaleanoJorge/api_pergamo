<?php

use App\Models\SelectRh;
use Illuminate\Database\Seeder;

class SelectRhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/select-rh.json'));

        foreach (json_decode($data) as $row) {
            SelectRh::create([
            
                'name' =>  $row->name,
            ]);
        }
    }
}
