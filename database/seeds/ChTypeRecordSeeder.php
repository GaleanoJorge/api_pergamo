<?php

use App\Models\ChTypeRecord;
use Illuminate\Database\Seeder;

class ChTypeRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_type_record.json'));

        foreach (json_decode($data) as $row) {
            ChTypeRecord::create([
        
                'name' =>  $row->name,
            ]);
        }
    }
}
