<?php

namespace App\Http\Controllers\Management;

use App\Models\ChVitalTemperature;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class ChVitalTemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChVitalTemperature = ChVitalTemperature::select();

        if ($request->_sort) {
            $ChVitalTemperature->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChVitalTemperature->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChVitalTemperature = $ChVitalTemperature->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChVitalTemperature = $ChVitalTemperature->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Diagnósticos obtenidos exitosamente',
            'data' => ['ch_vital_temperature' => $ChVitalTemperature]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChVitalTemperature = new ChVitalTemperature;
        $ChVitalTemperature->name = $request->name;


        $ChVitalTemperature->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico asociado al paciente exitosamente',
            'data' => ['ch_vital_temperature' => $ChVitalTemperature->toArray()]
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
        $ChVitalTemperature = ChVitalTemperature::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico obtenido exitosamente',
            'data' => ['ch_vital_temperature' => $ChVitalTemperature]
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
        $ChVitalTemperature = ChVitalTemperature::find($id);
        $ChVitalTemperature->name = $request->name;



        $ChVitalTemperature->save();

        return response()->json([
            'status' => true,
            'message' => 'Diagnóstico actualizado exitosamente',
            'data' => ['ch_vital_temperature' => $ChVitalTemperature]
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
            $ChVitalTemperature = ChVitalTemperature::find($id);
            $ChVitalTemperature->delete();

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
