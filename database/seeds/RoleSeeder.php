<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/role.json'));

        foreach (json_decode($data) as $row) {
            Role::create([
                'id' => $row->id,
                'status_id' => $row->status_id,
                'role_type_id' => $row->role_type_id,
                'name' => $row->name,
                'sga_origin_fk' => $row->sga_origin_fk
            ]);
        }
    }
}
