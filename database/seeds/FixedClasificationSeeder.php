<?php

use App\Models\FixedClasification;
use Illuminate\Database\Seeder;

class FixedClasificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/fixed-clasification.json'));

        foreach (json_decode($data) as $row) {
            FixedClasification::create([
                'name' =>  $row->name,
                'fixed_code_id' =>  $row->fixed_code_id,
                'fixed_type_id' =>  $row->fixed_type_id,
            ]);
        }
    }
}
