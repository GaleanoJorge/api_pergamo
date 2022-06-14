<?php

use App\Models\FixedProperty;
use Illuminate\Database\Seeder;

class FixedPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/fixed_property.json'));

        foreach (json_decode($data) as $row) {
            FixedProperty::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
