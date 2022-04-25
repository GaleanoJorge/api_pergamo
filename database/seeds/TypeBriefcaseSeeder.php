<?php

use App\Models\TypeBriefcase;
use Illuminate\Database\Seeder;

class TypeBriefcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/type-briefcase.json'));

        foreach (json_decode($data) as $row) {
            TypeBriefcase::create([
                'code' => $row->code,
                'name' =>  $row->name,
            ]);
        }
    }
}
