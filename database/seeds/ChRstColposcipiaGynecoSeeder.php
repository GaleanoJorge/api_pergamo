<?php

use App\Models\ChRstColposcipiaGyneco;
use Illuminate\Database\Seeder;

class ChRstColposcipiaGynecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_rst_colposcipia_gyneco.json'));

        foreach (json_decode($data) as $row) {
            ChRstColposcipiaGyneco::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
