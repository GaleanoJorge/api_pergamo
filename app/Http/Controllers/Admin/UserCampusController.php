<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Models\UserCampus;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserCampusController extends Controller
{
    /**
     * Display a listing of the resource by role id
     *
     * @param integer $roleId
     * @return JsonResponse
     */
    public function getByUser(int $userId): JsonResponse
    {
        $campus = UserCampus::where('user_id', $userId)
            ->with('campus','campus.region')
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Campus por usuario obtenidos exitosamente',
            'data' => ['campus' => $campus]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $exist = UserCampus::where([
            ['user_id', $request->user_id],
            ['campus_id', $request->campus_id]
        ])->get()->count();

        if ($exist) {
            throw new Exception("La sede ya esta asociada a este usuario", 423);
        }

        $userCampus = new UserCampus;
        $userCampus->user_id = $request->user_id;
        $userCampus->campus_id = $request->campus_id;
        $userCampus->save();

        return response()->json([
            'status' => true,
            'message' => 'Sede asignada ecitosamente',
            'data' => ['userCampus' => $userCampus->toArray()]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $itemRolePermission = ItemRolePermission::find($id);
            $itemRolePermission->delete();

            return response()->json([
                'status' => true,
                'message' => 'Permiso del rol en el item eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El permiso del rol en el item está en uso, no es posible eliminarlo',
            ], 423);
        }
    }
}
