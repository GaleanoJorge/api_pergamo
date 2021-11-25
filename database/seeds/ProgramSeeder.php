<?php

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/program.json'));

        foreach (json_decode($data) as $row) {
            Program::create([
                'id' => $row->id,
                'name' => $row->name,
                'scope_of_attention_id'=> $row->scope_of_attention_id
            ]);
        }
    }
}
