<?php

namespace App\Http\Controllers\Management;

use App\Models\DeniedReason;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DeniedReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $DeniedReason = DeniedReason::select();

        if ($request->_sort) {
            $DeniedReason->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $DeniedReason->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->denied_type_id) {
            $DeniedReason->where('denied_type_id', $request->denied_type_id);
        }

        if ($request->query("pagination", true) == "false") {
            $DeniedReason = $DeniedReason->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $DeniedReason = $DeniedReason->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['denied_reason' => $DeniedReason]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $DeniedReason = new DeniedReason;
        $DeniedReason->name = $request->name;
        $DeniedReason->denied_type_id = $request->denied_type_id;
        $DeniedReason->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta creados exitosamente',
            'data' => ['denied_reason' => $DeniedReason->toArray()]
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
        $DeniedReason = DeniedReason::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta obtenidos exitosamente',
            'data' => ['denied_reason' => $DeniedReason]
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
        $DeniedReason = DeniedReason::find($id);
        $DeniedReason->name = $request->name;
        $DeniedReason->denied_type_id = $request->denied_type_id;
        $DeniedReason->save();

        return response()->json([
            'status' => true,
            'message' => 'Días de dieta actualizados exitosamente',
            'data' => ['denied_reason' => $DeniedReason]
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
            $DeniedReason = DeniedReason::find($id);
            $DeniedReason->delete();

            return response()->json([
                'status' => true,
                'message' => 'Días de dieta eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Días de dieta estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
