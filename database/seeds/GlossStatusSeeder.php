<?php

use App\Models\GlossStatus;
use Illuminate\Database\Seeder;

class GlossStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jGlossStatus = file_get_contents(database_path('json/gloss_status.json'));
        
        foreach(json_decode($jGlossStatus) as $row){
            GlossStatus::create([
                'name' => $row->name
            ]);
        }
    }
}
