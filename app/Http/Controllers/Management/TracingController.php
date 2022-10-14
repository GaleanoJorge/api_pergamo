<?php

namespace App\Http\Controllers\Management;

use App\Models\Tracing;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TracingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $Tracing = Tracing::select('tracing.*');


        if ($request->record_id) {
            $Tracing->where('ch_record_id', $request->record_id);
        }

        if ($request->_sort) {
            $Tracing->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $Tracing->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $Tracing = $Tracing->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $Tracing = $Tracing->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Seguimiento obtenidos exitosamente',
            'data' => ['tracing' => $Tracing]
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id = null): JsonResponse
    {


        $Tracing = Tracing::where('ch_record_id', $id)
      ->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Seguimiento obtenido exitosamente',
            'data' => ['tracing' => $Tracing]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $Tracing = new Tracing;
        $Tracing->observation = $request->observation;
        $Tracing->ch_record_id = $request->ch_record_id;
        $Tracing->save();      

           
       

        return response()->json([
            'status' => true,
            'message' => 'Seguimiento asociado al paciente exitosamente',
            'data' => ['tracing' => $Tracing->toArray()]
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
        $Tracing = Tracing::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Seguimiento obtenido exitosamente',
            'data' => ['tracing' => $Tracing]
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
        $Tracing = Tracing::find($id);
        $Tracing = new Tracing;
        $Tracing->observation = $request->observation;
        $Tracing->ch_record_id = $request->ch_record_id;
        $Tracing->save();           
   
       

        return response()->json([
            'status' => true,
            'message' => 'Seguimiento actualizado exitosamente',
            'data' => ['tracing' => $Tracing]
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
            $Tracing = Tracing::find($id);
            $Tracing->delete();

            return response()->json([
                'status' => true,
                'message' => 'Seguimiento eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Seguimiento en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
