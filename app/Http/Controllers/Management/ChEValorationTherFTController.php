<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEValorationTherFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEValorationTherFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEValorationTherFT = ChEValorationTherFT::select();


        if ($request->ch_record_id) {
            $ChEValorationTherFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEValorationTherFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEValorationTherFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEValorationTherFT = $ChEValorationTherFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEValorationTherFT = $ChEValorationTherFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_valoration_ther_f_t' => $ChEValorationTherFT]
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


        $ChEValorationTherFT = ChEValorationTherFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_valoration_ther_f_t' => $ChEValorationTherFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEValorationTherFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEValorationTherFT = new ChEValorationTherFT;
        $ChEValorationTherFT->illness = $request->illness;
        $ChEValorationTherFT->sports = $request->sports;
        $ChEValorationTherFT->obsertations = $request->obsertations;
        $ChEValorationTherFT->days_number = $request->days_number;
        $ChEValorationTherFT->minutes_number = $request->minutes_number;

        $ChEValorationTherFT->type_record_id = $request->type_record_id;
        $ChEValorationTherFT->ch_record_id = $request->ch_record_id;
        $ChEValorationTherFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_valoration_ther_f_t' => $ChEValorationTherFT->toArray()]
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
        $ChEValorationTherFT = ChEValorationTherFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_valoration_ther_f_t' => $ChEValorationTherFT]
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
        $ChEValorationTherFT = ChEValorationTherFT::find($id);
        $ChEValorationTherFT->illness = $request->illness;
        $ChEValorationTherFT->sports = $request->sports;
        $ChEValorationTherFT->obsertations = $request->obsertations;
        $ChEValorationTherFT->days_number = $request->days_number;
        $ChEValorationTherFT->minutes_number = $request->minutes_number;
        
        $ChEValorationTherFT->type_record_id = $request->type_record_id;
        $ChEValorationTherFT->ch_record_id = $request->ch_record_id;
        $ChEValorationTherFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_valoration_ther_f_t' => $ChEValorationTherFT]
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
            $ChEValorationTherFT = ChEValorationTherFT::find($id);
            $ChEValorationTherFT->delete();

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
