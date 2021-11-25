<?php

use App\Models\GlossService;
use Illuminate\Database\Seeder;

class GlossServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/gloss_service.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            GlossService::create([
                'name' => $row->name,
                'gloss_ambit_id' => $row->gloss_ambit_id,
                'status_id' => $row->status_id,
            ]);
        }
    }
}
