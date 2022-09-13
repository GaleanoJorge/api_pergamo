<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNotesDescription;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNotesDescriptionRequest;
use Illuminate\Database\QueryException;

class ChNotesDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNotesDescription = ChNotesDescription::select('ch_notes_description.*')
        ->with(
            'change_position',
        );

        if ($request->_sort) {
            $ChNotesDescription->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNotesDescription->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChNotesDescription = $ChNotesDescription->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNotesDescription = $ChNotesDescription->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'notas de enfermeria asociadas exitosamente',
            'data' => ['ch_notes_description' => $ChNotesDescription]
        ]);
    }


    public function store(ChNotesDescriptionRequest $request)
    {
        $ChNotesDescription = new ChNotesDescription;
        $ChNotesDescription->patient_position_id = $request->patient_position_id;
        $ChNotesDescription->patient_dry = $request->patient_dry;
        $ChNotesDescription->unit_arrangement = $request->unit_arrangement;
        $ChNotesDescription->type_record_id = $request->type_record_id;
        $ChNotesDescription->ch_record_id = $request->ch_record_id;

        $ChNotesDescription->save();

        return response()->json([
            'status' => true,
            'message' => 'notas de enfermeria creadas exitosamente',
            'data' => ['ch_notes_description' => $ChNotesDescription->toArray()]
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
       
        $ChNotesDescription = ChNotesDescription::select('ch_notes_description.*')
            ->where('ch_record_id', $id)
            ->where('ch_notes_description.type_record_id', 1)
            ->where('type_record_id', $type_record)
            ->with(
                'patient_position',
            );;


            if ($request->query("pagination", true) == "false") {
                $ChNotesDescription = $ChNotesDescription->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);
    
                $ChNotesDescription = $ChNotesDescription->paginate($per_page, '*', 'page', $page);
            }

        return response()->json([
            'status' => true,
            'message' => 'Notas al paciente exitosamente',
            'data' => ['ch_notes_description' => $ChNotesDescription]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChNotesDescription = ChNotesDescription::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'notas de enfermeria obtenidas exitosamente',
            'data' => ['ch_notes_description' => $ChNotesDescription]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(ChNotesDescriptionRequest $request, int $id): JsonResponse
    {
        $ChNotesDescription = ChNotesDescription::find($id);
        $ChNotesDescription->patient_position_id = $request->patient_position_id;
        $ChNotesDescription->unit_arrangement = $request->unit_arrangement;
        $ChNotesDescription->type_record_id = $request->type_record_id;
        $ChNotesDescription->ch_record_id = $request->ch_record_id;
        $ChNotesDescription->patient_dry = $request->patient_dry;
        $ChNotesDescription->save();

        return response()->json([
            'status' => true,
            'message' => 'notas de enfermeria actualizadas exitosamente',
            'data' => ['ch_notes_description' => $ChNotesDescription]
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
            $ChNotesDescription = ChNotesDescription::find($id);
            $ChNotesDescription->delete();

            return response()->json([
                'status' => true,
                'message' => 'notas de enfermeria eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'notas de enfermeria estan en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
