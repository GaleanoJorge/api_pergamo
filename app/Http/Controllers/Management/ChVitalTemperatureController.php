<?php

namespace App\Http\Controllers\Management;

use App\Models\VitalTemperature;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class VitalTemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $VitalTemperature = VitalTemperature::select();

        if ($request->_sort) {
            $VitalTemperature->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $VitalTemperature->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $VitalTemperature = $VitalTemperature->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $VitalTemperature = $VitalTemperature->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Diagnósticos obtenidos exitosamente',
            'data' => ['ch_vital_temperature' => $VitalTemperature]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $VitalTemperature = new VitalTemperature;
        $VitalTemperature->name = $request->name;


        $VitalTemperature->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico asociado al paciente exitosamente',
            'data' => ['ch_vital_temperature' => $VitalTemperature->toArray()]
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
        $VitalTemperature = VitalTemperature::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico obtenido exitosamente',
            'data' => ['ch_vital_temperature' => $VitalTemperature]
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
        $VitalTemperature = VitalTemperature::find($id);
        $VitalTemperature->name = $request->name;



        $VitalTemperature->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico actualizado exitosamente',
            'data' => ['ch_vital_temperature' => $VitalTemperature]
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
            $VitalTemperature = VitalTemperature::find($id);
            $VitalTemperature->delete();

            return response()->json([
                'status' => true,
                'message' => 'Diagnóstico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Diagnóstico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
