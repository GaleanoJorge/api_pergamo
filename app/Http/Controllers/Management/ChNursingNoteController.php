<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNursingNote;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChNursingNoteRequest;
use Illuminate\Database\QueryException;

class ChNursingNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $ChNursingNote = ChNursingNote::select('ch_nursing_note.*');

        if ($request->_sort) {
            $ChNursingNote->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNursingNote->where('description', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChNursingNote = $ChNursingNote->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNursingNote = $ChNursingNote->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Nota de enfermeria asociadas exitosamente',
            'data' => ['ch_nursing_note' => $ChNursingNote]
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
       
        $ChNursingNote = ChNursingNote::select('ch_nursing_note.*')
            ->where('ch_record_id', $id)
            ->where('type_record_id', $type_record);


            if ($request->query("pagination", true) == "false") {
                $ChNursingNote = $ChNursingNote->get()->toArray();
            } else {
                $page = $request->query("current_page", 1);
                $per_page = $request->query("per_page", 10);
    
                $ChNursingNote = $ChNursingNote->paginate($per_page, '*', 'page', $page);
            }

        return response()->json([
            'status' => true,
            'message' => 'Notas al paciente exitosamente',
            'data' => ['ch_nursing_note' => $ChNursingNote]
        ]);
    }


    public function store(Request $request)
    {
        $validate = ChNursingNote::select('ch_nursing_note.*')
            ->where('ch_record_id', $request->ch_record_id)
            ->where('type_record_id', $request->type_record_id)->first();
        if (!$validate) {
            $ChNursingNote = new ChNursingNote;
            $ChNursingNote->observation = $request->observation;
            $ChNursingNote->type_record_id = $request->type_record_id;
            $ChNursingNote->ch_record_id = $request->ch_record_id;
            $ChNursingNote->save();

            return response()->json([
                'status' => true,
                'message' => 'Nota de enfermeria creada exitosamente',
                'data' => ['ch_nursing_note' => $ChNursingNote->toArray()]
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
        $ChNursingNote = ChNursingNote::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Nota de enfermeria obtenidas exitosamente',
            'data' => ['ch_nursing_note' => $ChNursingNote]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $ChNursingNote = ChNursingNote::find($id);
        $ChNursingNote->observation = $request->observation;
        $ChNursingNote->save();

        return response()->json([
            'status' => true,
            'message' => 'Nota de enfermeria actualizadas exitosamente',
            'data' => ['ch_nursing_note' => $ChNursingNote]
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
            $ChNursingNote = ChNursingNote::find($id);
            $ChNursingNote->delete();

            return response()->json([
                'status' => true,
                'message' => 'Nota de enfermeria eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Nota de enfermeria esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
