<?php

use App\Models\BiomedicalClassification;
use Illuminate\Database\Seeder;

class BiomedicalClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/biomedical-classification.json'));

        foreach (json_decode($data) as $row) {
            BiomedicalClassification::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
