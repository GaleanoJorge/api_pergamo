<?php

use App\Models\PolicyType;
use Illuminate\Database\Seeder;

class PolicyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/policy-type.json'));

        foreach (json_decode($data) as $row) {
            PolicyType::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
