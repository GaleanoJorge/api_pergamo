<?php

use App\Models\ChRstCytologyGyneco;
use Illuminate\Database\Seeder;

class ChRstCytologyGynecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_rst_cytology_gyneco.json'));

        foreach (json_decode($data) as $row) {
            ChRstCytologyGyneco::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
