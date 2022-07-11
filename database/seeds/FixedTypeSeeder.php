<?php

use App\Models\FixedType;
use Illuminate\Database\Seeder;

class FixedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/fixed_type.json'));

        foreach (json_decode($data) as $row) {
            FixedType::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
