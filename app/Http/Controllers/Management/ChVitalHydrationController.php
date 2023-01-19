<?php

namespace App\Http\Controllers\Management;

use App\Models\ChVitalHydration;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Base\ChChVitalHydration;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChVitalHydrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChVitalHydration = ChVitalHydration::select();

        if ($request->_sort) {
            $ChVitalHydration->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChVitalHydration->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChVitalHydration = $ChVitalHydration->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChVitalHydration = $ChVitalHydration->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Estado hidratación obtenidos exitosamente',
            'data' => ['ch_vital_hydration' => $ChVitalHydration]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChVitalHydration = new ChVitalHydration;
        $ChVitalHydration->name = $request->name;
        $ChVitalHydration->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado hidratación asociado al paciente exitosamente',
            'data' => ['ch_vital_hydration' => $ChVitalHydration->toArray()]
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
        $ChVitalHydration = ChVitalHydration::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Estado hidratación obtenido exitosamente',
            'data' => ['ch_vital_hydration' => $ChVitalHydration]
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
        $ChVitalHydration = ChVitalHydration::find($id);
        $ChVitalHydration->name = $request->name;
        $ChVitalHydration->save();

        return response()->json([
            'status' => true,
            'message' => 'Estado hidratación actualizado exitosamente',
            'data' => ['ch_vital_hydration' => $ChVitalHydration]
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
            $ChVitalHydration = ChVitalHydration::find($id);
            $ChVitalHydration->delete();

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
