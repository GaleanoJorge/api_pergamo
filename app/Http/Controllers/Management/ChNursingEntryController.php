<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNursingEntry;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNursingEntryRequest;
use Illuminate\Database\QueryException;

class ChNursingEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNursingEntry = ChNursingEntry::select();

        if ($request->_sort) {
            $ChNursingEntry->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNursingEntry->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChNursingEntry = $ChNursingEntry->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNursingEntry = $ChNursingEntry->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria asociadas exitosamente',
            'data' => ['ch_nursing_entry' => $ChNursingEntry]
        ]);
    }


    public function store(ChNursingEntryRequest $request)
    {
        $validate = ChNursingEntry::select('ch_nursing_entry.*')->where('ch_record_id', $request->ch_record_id);
        if (!isset($validate)) {
            $ChNursingEntry = new ChNursingEntry;
            $ChNursingEntry->patient_position_id = $request->patient_position_id;
            $ChNursingEntry->ostomy_id = $request->ostomy_id;
            $ChNursingEntry->observation = $request->observation;
            $ChNursingEntry->hair_revision = $request->hair_revision;
            $ChNursingEntry->type_record_id = $request->type_record_id;
            $ChNursingEntry->ch_record_id = $request->ch_record_id;
            $ChNursingEntry->save();

            return response()->json([
                'status' => true,
                'message' => 'Entrada de enfermeria creada exitosamente',
                'data' => ['ch_nursing_entry' => $ChNursingEntry->toArray()]
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
        $ChNursingEntry = ChNursingEntry::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Posiciones de paciente obtenidas exitosamente',
            'data' => ['ch_nursing_entry' => $ChNursingEntry]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNursingEntryRequest $request, int $id): JsonResponse
    {
        $ChNursingEntry = ChNursingEntry::find($id);
        $ChNursingEntry->patient_position_id = $request->patient_position_id;
        $ChNursingEntry->ostomy_id = $request->ostomy_id;
        $ChNursingEntry->observation = $request->observation;
        $ChNursingEntry->hair_revision = $request->hair_revision;
        // $ChNursingEntry->type_record_id = $request->type_record_id; 
        // $ChNursingEntry->ch_record_id = $request->ch_record_id; 
        $ChNursingEntry->save();

        return response()->json([
            'status' => true,
            'message' => 'Entrada de enfermeria actualizadas exitosamente',
            'data' => ['ch_nursing_entry' => $ChNursingEntry]
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
            $ChNursingEntry = ChNursingEntry::find($id);
            $ChNursingEntry->delete();

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
