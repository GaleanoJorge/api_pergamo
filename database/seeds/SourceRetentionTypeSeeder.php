<?php

use App\Models\SourceRetentionType;
use Illuminate\Database\Seeder;

class SourceRetentionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jSourceRetentionType = file_get_contents(database_path('json/source_retention_type.json'));
        
        foreach(json_decode($jSourceRetentionType) as $row){
            SourceRetentionType::create([
                'value' => $row->value,
                'name' => $row->name,
                'type' => $row->type,
                'tax_value_unit_id' => $row->tax_value_unit_id,
            ]);
        }
    }
}
