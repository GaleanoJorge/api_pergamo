<?php

use App\Models\PbsType;
use Illuminate\Database\Seeder;

class PbsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/pbs-type.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            PbsType::create([
                'name' => $row->name,
            ]);
        }
    }
}
