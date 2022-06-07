<?php

use App\Models\FixedCode;
use Illuminate\Database\Seeder;

class FixedCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/fixed_code.json'));

        foreach (json_decode($data) as $row) {
            FixedCode::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
