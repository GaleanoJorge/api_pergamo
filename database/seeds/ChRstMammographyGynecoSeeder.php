<?php

use App\Models\ChRstMammographyGyneco;
use Illuminate\Database\Seeder;

class ChRstMammographyGynecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_rst_mammography_gyneco.json'));

        foreach (json_decode($data) as $row) {
            ChRstMammographyGyneco::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
