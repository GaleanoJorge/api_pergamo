<?php

use App\Models\GlossAmbit;
use Illuminate\Database\Seeder;

class GlossAmbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/gloss_ambit.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            GlossAmbit::create([
                'name' => $row->name,
                'gloss_modality_id' => $row->gloss_modality_id,
                'status_id' => $row->status_id,
            ]);
        }
    }
}
