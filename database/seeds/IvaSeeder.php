<?php

use App\Models\Iva;
use Illuminate\Database\Seeder;

class IvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/Iva.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            Iva::create([
                'name' => $row->name,
            ]);
        }
    }
}
