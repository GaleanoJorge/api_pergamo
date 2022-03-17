<?php

namespace App\Http\Controllers\Management;

use App\Models\VitalHydration;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class VitalHydrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $VitalHydration = VitalHydration::select();

        if ($request->_sort) {
            $VitalHydration->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $VitalHydration->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $VitalHydration = $VitalHydration->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $VitalHydration = $VitalHydration->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Estado hidratación obtenidos exitosamente',
            'data' => ['ch_vital_hydration' => $VitalHydration]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $VitalHydration = new VitalHydration;
        $VitalHydration->name = $request->name;
        $VitalHydration->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado hidratación asociado al paciente exitosamente',
            'data' => ['ch_vital_hydration' => $VitalHydration->toArray()]
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
        $VitalHydration = VitalHydration::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado hidratación obtenido exitosamente',
            'data' => ['ch_vital_hydration' => $VitalHydration]
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
        $VitalHydration = VitalHydration::find($id);
        $VitalHydration->name = $request->name;
        $VitalHydration->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado hidratación actualizado exitosamente',
            'data' => ['ch_vital_hydration' => $VitalHydration]
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
            $VitalHydration = VitalHydration::find($id);
            $VitalHydration->delete();

            return response()->json([
                'status' => true,
                'message' => 'Estado hidratación eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Estado hidratación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
