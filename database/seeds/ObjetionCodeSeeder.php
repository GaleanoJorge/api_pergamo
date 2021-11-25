<?php

use App\Models\ObjetionCode;
use Illuminate\Database\Seeder;

class ObjetionCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/objetion_code.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ObjetionCode::create([
                'code' => $row->code,
                'name' => $row->name,
            ]);
        }
    }
}
