<?php

use App\Models\TypeOfAttention;
use Illuminate\Database\Seeder;

class TypeOfAttentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type_of_attention.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            TypeOfAttention::create([
                'name' => $row->name,
            ]);
        }
    }
}
