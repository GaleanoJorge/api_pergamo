<?php

namespace App\Actions\Admin;

use App\Models\Item;

class GetMenuItemsDynamic
{
    /**
     * Handle items dynamic by rol and permission
     *
     * @param integer $roleId
     * @return void
     */
    public static function handle(int $roleId)
    {
        $allItems = Item::whereHas('itemRolePermission', function ($itemRolePermission)
        use ($roleId) {
            $itemRolePermission->where([
                ['role_id', $roleId],
                ['permission_id', 1]
            ]);
        })->with(['itemRolePermission' => function ($itemRolePermission) use ($roleId) {
            $itemRolePermission->where('role_id', $roleId)
                ->where(function ($query) {
                    $query->where('permission_id', 1)
                        ->orWhere('permission_id', 2)
                        ->orWhere('permission_id', 3)
                        ->orWhere('permission_id', 4);
                })->with('permission');
        }])->get();

        return self::getMenuDynamic(null, $allItems);
    }

    /**
     * Get items menu dynamic
     *
     * @param integer|null $parent
     * @param mixed $items
     * @param integer $level
     * @return void
     */
    private static function getMenuDynamic(
        ?int $parent,
        $items,
        int $level = 0
    ) {
        $levelItems = [];

        foreach ($items as $key => $row) {

            if ($row->item_parent_id == $parent) {
                $levelItems[$row->id] = $row;

                for ($i = 0; $i < $level; $i++) {
                    $levelItems[$row->id]->level = $level + 2;
                }

                $levelItems[$row->id]->subitems = self::getMenuDynamic(
                    $row->id,
                    $items,
                    $level + 2
                );
            }
        }

        return $levelItems;
    }
}
