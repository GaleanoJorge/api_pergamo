<?php

namespace App\Actions\Management;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRoleEducationalInstitution;

class GetCategoriesDynamic
{
    /**
     * Handle categories dynamic by rol associate institution
     *
     * @param integer $originId
     * @return void
     */
    public static function handle(int $originId)
    {
        $allCategories = self::allCategories($originId);

        return self::getCategoriesDynamic(null, $allCategories);
    }

    /**
     * Merge parent and children categories
     *
     * @param integer $originId
     * @return void
     */
    private static function allCategories(int $originId)
    {
        $parentCategories = self::getCategoriesParent($originId);
        $childrenCategories = self::getCategoriesChildren($originId);

        return $parentCategories->merge($childrenCategories);
    }

    /**
     * Get categories by parent
     *
     * @param integer $originId
     * @return void
     */
    private static function getCategoriesParent(int $originId)
    {
        $userRoles = Arr::pluck(Auth::user()->roles, 'pivot.id');
        $institutions = UserRoleEducationalInstitution::whereIn(
            'user_role_id',
            $userRoles
        )->select('educational_institution_id')->get()->toArray();

        return Category::where('origin_id', $originId)
            ->whereHas('courses', function ($course) use ($institutions) {
                $course->whereHas('educational_institutions', function ($institution) use ($institutions) {
                    $institution->whereIn('educational_institution_id', $institutions);
                });
            })
            ->get();
    }

    /**
     * Get categories by children
     *
     * @param integer $originId
     * @return void
     */
    private static function getCategoriesChildren(int $originId)
    {
        return Category::where([
            ['origin_id', $originId],
            ['category_parent_id', '!=', null]
        ])->get();
    }

    /**
     * Get categories dynamic
     *
     * @param integer|null $parent
     * @param [type] $categories
     * @param integer $level
     * @return void
     */
    private static function getCategoriesDynamic(
        ?int $parent,
        $categories,
        int $level = 0
    ) {
        $levelCategories = [];

        foreach ($categories as $key => $row) {

            if ($row->category_parent_id == $parent) {
                $levelCategories[$row->id] = $row;

                for ($i = 0; $i < $level; $i++) {
                    $levelCategories[$row->id]->level = $level + 2;
                }

                $levelCategories[$row->id]->subcategories = self::getCategoriesDynamic(
                    $row->id,
                    $categories,
                    $level + 2
                );
            }
        }

        return $levelCategories;
    }
}
