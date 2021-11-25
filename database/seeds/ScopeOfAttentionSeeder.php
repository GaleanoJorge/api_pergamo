<?php

use App\Models\ScopeOfAttention;
use Illuminate\Database\Seeder;

class ScopeOfAttentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/scope_of_attention.json'));

        foreach (json_decode($data) as $row) {
            ScopeOfAttention::create([
                'id' => $row->id,
                'name' => $row->name,
                'admission_route_id'=> $row->admission_route_id
            ]);
        }
    }
}
