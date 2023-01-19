<?php

use App\Models\RoleAttention;
use Illuminate\Database\Seeder;

class RoleAttentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jRoleAttention = file_get_contents(database_path('json/role_attention.json'));
        
        foreach(json_decode($jRoleAttention) as $row){
            RoleAttention::create([
                'role_id' => $row->role_id,
                'specialty_id' => $row->specialty_id,
                'type_of_attention_id' => $row->type_of_attention_id,
            ]);
        }
    }
}
