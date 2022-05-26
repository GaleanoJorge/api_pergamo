<?php

namespace App\Http\Controllers\Management;

use App\Models\FixedTypeRole;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class FixedTypeRoleRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $FixedTypeRole = FixedTypeRole::select();

        if ($request->_sort) {
            $FixedTypeRole->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $FixedTypeRole->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $FixedTypeRole = $FixedTypeRole->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $FixedTypeRole = $FixedTypeRole->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Tipo obtenidos exitosamente',
            'data' => ['fixed_type_role' => $FixedTypeRole]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $FixedTypeRole = new FixedTypeRole;
        $FixedTypeRole->fixed_type_id = $request->fixed_type_id;
        $FixedTypeRole->role_id = $request->role_id;
        $FixedTypeRole->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo asociado exitosamente',
            'data' => ['fixed_type_role' => $FixedTypeRole->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $FixedTypeRole = FixedTypeRole::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tipo obtenido exitosamente',
            'data' => ['fixed_type_role' => $FixedTypeRole]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $FixedTypeRole = FixedTypeRole::find($id);
        $FixedTypeRole->fixed_type_id = $request->fixed_type_id;
        $FixedTypeRole->role_id = $request->role_id;
        $FixedTypeRole->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo actualizado exitosamente',
            'data' => ['fixed_type_role' => $FixedTypeRole]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $FixedTypeRole = FixedTypeRole::find($id);
            $FixedTypeRole->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tipo eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Tipo en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
