<?php

use App\Models\RipsTypefile;
use Illuminate\Database\Seeder;

class RipsTypefileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/rips-typefile.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            RipsTypefile::create([
                'code' => $row->code,
                'name' => $row->name,
            ]);
        }
    }
}
