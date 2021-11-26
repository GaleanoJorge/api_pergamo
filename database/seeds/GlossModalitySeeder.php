<?php

use App\Models\GlossModality;
use Illuminate\Database\Seeder;

class GlossModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/gloss_modality.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            GlossModality::create([
                'name' => $row->name,
                'status_id' => $row->status_id,
            ]);
        }
    }
}
