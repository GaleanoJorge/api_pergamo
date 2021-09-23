<?php

use App\Models\CompanyCategory;
use Illuminate\Database\Seeder;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/company-category.json'));

        foreach (json_decode($data) as $row) {
            //print_r($row);
            CompanyCategory::create([
                'name' => $row->name,
            ]);
        }
    }
}
