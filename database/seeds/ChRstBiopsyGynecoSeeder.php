<?php

use App\Models\ChRstBiopsyGyneco;
use Illuminate\Database\Seeder;

class ChRstBiopsyGynecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_rst_biopsy_gyneco.json'));

        foreach (json_decode($data) as $row) {
            ChRstBiopsyGyneco::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
