<?php

use App\Models\ProcedureCategory;
use Illuminate\Database\Seeder;

class ProcedureCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/procedure-category.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            ProcedureCategory::create([
                'name' => $row->name,
                'rips_type_id' => $row->rips_type_id,
            ]);
        }
    }
}
