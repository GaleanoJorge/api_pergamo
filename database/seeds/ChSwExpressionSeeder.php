<?php

use App\Models\ChSwExpression;
use Illuminate\Database\Seeder;

class ChSwExpressionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/ch_sw_expression.json'));

        foreach (json_decode($data) as $row) {
            ChSwExpression::create([
                'name' =>  $row->name,
            ]);
        }
    }
}
