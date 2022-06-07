<?php

use App\Models\RecommendationsEvo;
use Illuminate\Database\Seeder;

class RecommendationsEvoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jRecommendationsEvo = file_get_contents(database_path('json/recommendations-evo.json'));
        
        foreach(json_decode($jRecommendationsEvo) as $row){
            RecommendationsEvo::create([
                'name' => $row->name,
                'description' => $row->description
            ]);
        }
    }
}
