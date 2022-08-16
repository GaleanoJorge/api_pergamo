<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEValorationFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEValorationFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEValorationFT = ChEValorationFT::select();


        if ($request->ch_record_id) {
            $ChEValorationFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEValorationFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEValorationFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEValorationFT = $ChEValorationFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEValorationFT = $ChEValorationFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_valoration_f_t' => $ChEValorationFT]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id, int $type_record_id): JsonResponse
    {


        $ChEValorationFT = ChEValorationFT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with('ch_diagnosis')->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_valoration_f_t' => $ChEValorationFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEValorationFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEValorationFT = new ChEValorationFT;
        $ChEValorationFT->patient_state = $request->patient_state;
        $ChEValorationFT->ch_diagnosis_id = $request->ch_diagnosis_id;
        $ChEValorationFT->type_record_id = $request->type_record_id;
        $ChEValorationFT->ch_record_id = $request->ch_record_id;
        $ChEValorationFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_valoration_f_t' => $ChEValorationFT->toArray()]
        ]);
        // }else{
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Ya tiene observación'
        //     ], 423);
        // }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChEValorationFT = ChEValorationFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_valoration_f_t' => $ChEValorationFT]
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
        $ChEValorationFT = ChEValorationFT::find($id);
        $ChEValorationFT->patient_state = $request->patient_state;
        $ChEValorationFT->ch_diagnosis_id = $request->ch_diagnosis_id;
        $ChEValorationFT->type_record_id = $request->type_record_id;
        $ChEValorationFT->ch_record_id = $request->ch_record_id;
        $ChEValorationFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_valoration_f_t' => $ChEValorationFT]
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
            $ChEValorationFT = ChEValorationFT::find($id);
            $ChEValorationFT->delete();

            return response()->json([
                'status' => true,
                'message' => 'valoracion eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'valoracion en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
