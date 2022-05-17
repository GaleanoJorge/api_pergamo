<?php

use App\Models\Modality;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/modality.json'));

        foreach (json_decode($data) as $row) {
            Modality::create([
                'code' => $row->code,
                'name' =>  $row->name,
            ]);
        }
    }
}
