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
    public function getByUser(Request $request, int $userId): JsonResponse
    {
        $campus = UserCampus::where('user_campus.user_id', $userId)
            ->with('campus', 'campus.region')
            ->Leftjoin('campus', 'campus.id', 'user_campus.campus_id');

        // if ($request->status_id) {
        //     $campus->where('campus.status_id', $request->status_id);
        // }
        $campus = $campus->get()->toArray();

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
            'message' => 'Sede asignada exitosamente',
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
            $userCampus = userCampus::find($id);
            $userCampus->delete();

            return response()->json([
                'status' => true,
                'message' => 'La sede se ha eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'La sede está en uso, no es posible eliminarla',
            ], 423);
        }
    }
}
