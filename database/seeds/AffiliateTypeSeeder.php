<?php

use App\Models\AffiliateType;
use Illuminate\Database\Seeder;

class AffiliateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/affiliate-type.json'));

        foreach (json_decode($data) as $row) {
            AffiliateType::create([
                
                'name' =>  $row->name,
            ]);
        }
    }
}
