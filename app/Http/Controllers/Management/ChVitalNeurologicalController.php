<?php

namespace App\Http\Controllers\Management;

use App\Models\ChVitalNeurological;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class ChVitalNeurologicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChVitalNeurological = ChVitalNeurological::select();

        if ($request->_sort) {
            $ChVitalNeurological->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChVitalNeurological->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChVitalNeurological = $ChVitalNeurological->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChVitalNeurological = $ChVitalNeurological->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Neurológico obtenidos exitosamente',
            'data' => ['ch_vital_neurological' => $ChVitalNeurological]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChVitalNeurological = new ChVitalNeurological;
        $ChVitalNeurological->name = $request->name;
        $ChVitalNeurological->save();

        return response()->json([
            'status' => true,
            'message' => 'Neurológico asociado al paciente exitosamente',
            'data' => ['ch_vital_neurological' => $ChVitalNeurological->toArray()]
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
        $ChVitalNeurological = ChVitalNeurological::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Neurológico obtenido exitosamente',
            'data' => ['ch_vital_neurological' => $ChVitalNeurological]
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
        $ChVitalNeurological = ChVitalNeurological::find($id);
        $ChVitalNeurological->name = $request->name;
        $ChVitalNeurological->save();

        return response()->json([
            'status' => true,
            'message' => 'Neurológico actualizado exitosamente',
            'data' => ['ch_vital_neurological' => $ChVitalNeurological]
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
            $ChVitalNeurological = ChVitalNeurological::find($id);
            $ChVitalNeurological->delete();

            return response()->json([
                'status' => true,
                'message' => 'Neurológico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Neurológico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
