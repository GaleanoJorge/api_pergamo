<?php

use App\Models\TalentHumanAction;
use Illuminate\Database\Seeder;

class TalentHumanActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/talent_human_action.json'));

        foreach (json_decode($data) as $row) {
            TalentHumanAction::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
