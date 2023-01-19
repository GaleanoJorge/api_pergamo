<?php

use App\Models\Residence;
use Illuminate\Database\Seeder;

class ResidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/residence.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Residence::create([
                'name' => $row->name,
            ]);
        }
    }
}
