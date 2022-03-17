<?php

namespace App\Http\Controllers\Management;

use App\Models\VitalNeurological;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class VitalNeurologicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $VitalNeurological = VitalNeurological::select();

        if ($request->_sort) {
            $VitalNeurological->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $VitalNeurological->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $VitalNeurological = $VitalNeurological->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $VitalNeurological = $VitalNeurological->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Neurológico obtenidos exitosamente',
            'data' => ['ch_vital_neurological' => $VitalNeurological]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $VitalNeurological = new VitalNeurological;
        $VitalNeurological->name = $request->name;
        $VitalNeurological->save();

        return response()->json([
            'status' => true,
            'message' => 'Neurológico asociado al paciente exitosamente',
            'data' => ['ch_vital_neurological' => $VitalNeurological->toArray()]
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
        $VitalNeurological = VitalNeurological::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Neurológico obtenido exitosamente',
            'data' => ['ch_vital_neurological' => $VitalNeurological]
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
        $VitalNeurological = VitalNeurological::find($id);
        $VitalNeurological->name = $request->name;
        $VitalNeurological->save();

        return response()->json([
            'status' => true,
            'message' => 'Neurológico actualizado exitosamente',
            'data' => ['ch_vital_neurological' => $VitalNeurological]
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
            $VitalNeurological = VitalNeurological::find($id);
            $VitalNeurological->delete();

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
