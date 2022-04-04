<?php

use App\Models\AccountType;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/account_type.json'));

        foreach (json_decode($data) as $row) {
            AccountType::create([
                
                'name' => $row->name,
            ]);
        }
    }
}
