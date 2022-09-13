<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRNValorationOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChRNValorationOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRNValorationOT = ChRNValorationOT::with('ch_diagnosis');


//    if ($request->ch_record_id) {
 //         $ChRNValorationOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
  //      }

        if ($request->_sort) {
            $ChRNValorationOT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRNValorationOT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRNValorationOT = $ChRNValorationOT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRNValorationOT = $ChRNValorationOT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_valoration_o_t' => $ChRNValorationOT]
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
        $ChRNValorationOT = ChRNValorationOT::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->where('ch_r_n_valoration_o_t.type_record_id', 3)
            ->with('ch_diagnosis')->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_valoration_o_t' => $ChRNValorationOT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validate = ChRNValorationOT::select('ch_r_n_valoration_o_t.*')->where('ch_record_id', $request->ch_record_id)
        ->where('type_record_id', $request->type_record_id)
        ->get()->toArray();
         $validate=ChRNValorationOT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
         if(!$validate){
        $ChRNValorationOT = new ChRNValorationOT;
        $ChRNValorationOT->ch_diagnosis_id = $request->ch_diagnosis_id;
        $ChRNValorationOT->patient_state = $request->patient_state;
        $ChRNValorationOT->type_record_id = $request->type_record_id;
        $ChRNValorationOT->ch_record_id = $request->ch_record_id;
        $ChRNValorationOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_r_n_valoration_o_t' => $ChRNValorationOT->toArray()]
        ]);
         }else{
             return response()->json([
                 'status' => false,
                 'message' => 'Ya tiene observación'
             ], 423);
         }


    }
    

    
    /*
    
    public function refresh()
    {
        return $this->respondWithToken(auth($this->guard)->refresh());
    }

    */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChRNValorationOT = ChRNValorationOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_r_n_valoration_o_t' => $ChRNValorationOT]
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
        $ChRNValorationOT = ChRNValorationOT::find($id);
        $ChRNValorationOT->ch_diagnosis_id = $request->ch_diagnosis_id;
        $ChRNValorationOT->patient_state = $request->patient_state;
        $ChRNValorationOT->type_record_id = $request->type_record_id;
        $ChRNValorationOT->ch_record_id = $request->ch_record_id;
        $ChRNValorationOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_r_n_valoration_o_t' => $ChRNValorationOT]
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
            $ChRNValorationOT = ChRNValorationOT::find($id);
            $ChRNValorationOT->delete();

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
