<?php

namespace App\Actions\Sync;

use App\Models\User;

class GetStudentBySyncId
{
    /**
     * Get Student by Sync Id and Institution
     *
     * @param integer $syncId
     * @param integer $institutionId
     * @return User|null
     */
    public static function handle(int $syncId, int $institutionId): ?User
    {
        return User::select('users.*', 'user_role.id as user_role_id')
            ->join('user_role', 'user_role.user_id', '=', 'users.id')
            ->join(
                'user_role_educational_institution',
                'user_role_educational_institution.user_role_id',
                '=',
                'user_role.id'
            )
            ->where([
                ['users.sync_id', $syncId],
                ['user_role.role_id', 5],
                [
                    'user_role_educational_institution.educational_institution_id',
                    $institutionId
                ]
            ])->get()->first();
    }
}
