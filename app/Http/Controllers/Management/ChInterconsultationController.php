<?php

namespace App\Http\Controllers\Management;

use App\Models\ChInterconsultation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChInterconsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChInterconsultation = ChInterconsultation::select();

        if ($request->_sort) {
            $ChInterconsultation->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChInterconsultation->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChInterconsultation = $ChInterconsultation->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChInterconsultation = $ChInterconsultation->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Interconsulta obtenidos exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
       
        $ChInterconsultation = ChInterconsultation::where('ch_record_id', $id)
        ->where('type_record_id',$type_record_id)
        ->where('ch_interconsultation.type_record_id', 1)
        ->with('specialty','frequency')
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Interconsulta asociado al paciente exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChInterconsultation = new ChInterconsultation;
        $ChInterconsultation->specialty_id = $request->specialty_id;
        $ChInterconsultation->amount = $request->amount;
        $ChInterconsultation->frequency_id = $request->frequency_id;
        $ChInterconsultation->observations = $request->observations;
        $ChInterconsultation->type_record_id = $request->type_record_id;
        $ChInterconsultation->ch_record_id = $request->ch_record_id;
        $ChInterconsultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Interconsulta asociado al paciente exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation->toArray()]
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
        $ChInterconsultation = ChInterconsultation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Interconsulta obtenido exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation]
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
        $ChInterconsultation = ChInterconsultation::find($id);
        $ChInterconsultation->specialty_id = $request->specialty_id;
        $ChInterconsultation->amount = $request->amount;
        $ChInterconsultation->frequency_id = $request->frequency_id;
        $ChInterconsultation->observations = $request->observations;
        $ChInterconsultation->type_record_id = $request->type_record_id;
        $ChInterconsultation->ch_record_id = $request->ch_record_id;
        $ChInterconsultation->save();

        return response()->json([
            'status' => true,
            'message' => 'Interconsulta actualizado exitosamente',
            'data' => ['ch_interconsultation' => $ChInterconsultation]
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
            $ChInterconsultation = ChInterconsultation::find($id);
            $ChInterconsultation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Interconsulta eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Interconsulta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
