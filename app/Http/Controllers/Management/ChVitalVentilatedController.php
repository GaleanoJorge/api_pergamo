<?php

namespace App\Http\Controllers\Management;

use App\Models\ChVitalVentilated;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BedRequest;
use Illuminate\Database\QueryException;

class ChVitalVentilatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChVitalVentilated = ChVitalVentilated::select();

        if ($request->_sort) {
            $ChVitalVentilated->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChVitalVentilated->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChVitalVentilated = $ChVitalVentilated->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChVitalVentilated = $ChVitalVentilated->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio obtenidos exitosamente',
            'data' => ['ch_vital_ventilated' => $ChVitalVentilated]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChVitalVentilated = new ChVitalVentilated;
        $ChVitalVentilated->name = $request->name;
        $ChVitalVentilated->save();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio asociado al paciente exitosamente',
            'data' => ['ch_vital_ventilated' => $ChVitalVentilated->toArray()]
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
        $ChVitalVentilated = ChVitalVentilated::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio obtenido exitosamente',
            'data' => ['ch_vital_ventilated' => $ChVitalVentilated]
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
        $ChVitalVentilated = ChVitalVentilated::find($id);
        $ChVitalVentilated->name = $request->name;
        $ChVitalVentilated->save();

        return response()->json([
            'status' => true,
            'message' => 'Modo ventilatorio actualizado exitosamente',
            'data' => ['ch_vital_ventilated' => $ChVitalVentilated]
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
            $ChVitalVentilated = ChVitalVentilated::find($id);
            $ChVitalVentilated->delete();

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
