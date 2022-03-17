<?php

namespace App\Http\Controllers\Management;

use App\Models\VitalVentilated;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class VitalVentilatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $VitalVentilated = VitalVentilated::select();

        if ($request->_sort) {
            $VitalVentilated->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $VitalVentilated->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $VitalVentilated = $VitalVentilated->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $VitalVentilated = $VitalVentilated->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio obtenidos exitosamente',
            'data' => ['ch_vital_ventilated' => $VitalVentilated]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $VitalVentilated = new VitalVentilated;
        $VitalVentilated->name = $request->name;
        $VitalVentilated->save();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio asociado al paciente exitosamente',
            'data' => ['ch_vital_ventilated' => $VitalVentilated->toArray()]
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
        $VitalVentilated = VitalVentilated::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio obtenido exitosamente',
            'data' => ['ch_vital_ventilated' => $VitalVentilated]
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
        $VitalVentilated = VitalVentilated::find($id);
        $VitalVentilated->name = $request->name;
        $VitalVentilated->save();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio actualizado exitosamente',
            'data' => ['ch_vital_ventilated' => $VitalVentilated]
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
            $VitalVentilated = VitalVentilated::find($id);
            $VitalVentilated->delete();

            return response()->json([
                'status' => true,
                'message' => 'Modo ventilatorio eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Modo ventilatorio en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
