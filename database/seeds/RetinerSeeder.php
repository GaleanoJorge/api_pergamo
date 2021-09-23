<?php

use App\Models\Retiner;
use Illuminate\Database\Seeder;

class RetinerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/retiner.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Retiner::create([
                'name' => $row->name,
            ]);
        }
    }
}
