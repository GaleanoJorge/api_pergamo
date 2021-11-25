<?php

use App\Models\ObjetionCodeResponse;
use Illuminate\Database\Seeder;

class ObjetionCodeResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/objetion_code_response.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ObjetionCodeResponse::create([
                'code' => $row->code,
                'name' => $row->name,
            ]);
        }
    }
}
