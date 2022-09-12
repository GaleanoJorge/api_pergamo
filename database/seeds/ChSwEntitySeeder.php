<?php

use App\Models\ChSwEntity;
use Illuminate\Database\Seeder;

class ChSwEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_entity.json'));

        foreach (json_decode($data) as $row) {
            ChSwEntity::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
