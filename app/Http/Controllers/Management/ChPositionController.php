<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPosition;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChPositionRequest;
use Illuminate\Database\QueryException;

class ChPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChPosition = ChPosition::select('ch_position.*');

        if ($request->_sort) {
            $ChPosition->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPosition->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPosition = $ChPosition->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPosition = $ChPosition->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Posiciones del paciente asociadas exitosamente',
            'data' => ['ch_position' => $ChPosition]
        ]);
    }

            /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record): JsonResponse
    {
       
        $ChPosition = ChPosition::select('ch_position.*')
            ->where('ch_record_id', $id)
            ->where('type_record_id', $type_record)
            ->with(
                'patient_position'
            );;


            if ($request->query("pagination", true) == "false") {
                $ChPosition = $ChPosition->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);
    
                $ChPosition = $ChPosition->paginate($per_page, '*', 'page', $page);
            }

        return response()->json([
            'status' => true,
            'message' => 'Notas al paciente exitosamente',
            'data' => ['ch_position' => $ChPosition]
        ]);
    }


    public function store(ChPositionRequest $request)
    {
        $validate = ChPosition::select('ch_position.*')
            ->where('ch_record_id', $request->ch_record_id)
            ->where('type_record_id', $request->type_record_id)
            ->where('patient_position_id', $request->patient_position_id)->first();
        if (!$validate) {
            $ChPosition = new ChPosition;
            $ChPosition->patient_position_id = $request->patient_position_id;
            $ChPosition->observation = $request->observation;
            $ChPosition->type_record_id = $request->type_record_id;
            $ChPosition->ch_record_id = $request->ch_record_id;
            $ChPosition->save();

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria creada exitosamente',
                'data' => ['ch_position' => $ChPosition->toArray()]
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Ya tiene observación'
            ], 423);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChPosition = ChPosition::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['ch_position' => $ChPosition]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChPositionRequest $request, int $id): JsonResponse
    {
        $ChPosition = ChPosition::find($id);
        $ChPosition->patient_position_id = $request->patient_position_id;
        $ChPosition->observation = $request->observation;
        // $ChPosition->type_record_id = $request->type_record_id; 
        // $ChPosition->ch_record_id = $request->ch_record_id; 
        $ChPosition->save();

        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria actualizadas exitosamente',
            'data' => ['ch_position' => $ChPosition]
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
            $ChPosition = ChPosition::find($id);
            $ChPosition->delete();

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Entrada de enfermeria esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
