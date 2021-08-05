<?php

use Illuminate\Database\Seeder;
use App\Models\ItemRolePermission;

class ItemRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents(database_path('json/item_role_permission.json'));

        foreach (json_decode($data) as $row) {
            ItemRolePermission::create([
                'item_id' => $row->item_id,
                'role_id' => $row->role_id,
                'permission_id' => $row->permission_id,
            ]);
        }
    }
}
