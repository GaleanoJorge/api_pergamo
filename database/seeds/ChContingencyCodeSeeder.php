<?php

use App\Models\ChContingencyCode;
use Illuminate\Database\Seeder;

class ChContingencyCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_contingency_code.json'));

        foreach (json_decode($data) as $row) {
            ChContingencyCode::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
