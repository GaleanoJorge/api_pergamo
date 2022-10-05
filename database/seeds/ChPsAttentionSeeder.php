<?php

use App\Models\ChPsAttention;
use Illuminate\Database\Seeder;

class ChPsAttentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_ps_attention.json'));

        foreach (json_decode($data) as $row) {
            ChPsAttention::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
