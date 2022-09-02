<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEValorationOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEValorationOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEValorationOT = ChEValorationOT::select();


        if ($request->ch_record_id) {
            $ChEValorationOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEValorationOT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEValorationOT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEValorationOT = $ChEValorationOT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEValorationOT = $ChEValorationOT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_valoration_o_t' => $ChEValorationOT]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id, int $type_record_id): JsonResponse
    {


        $ChEValorationOT = ChEValorationOT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with('ch_diagnosis')->get()->toArray();

            if ($request->has_input) { //
                if ($request->has_input == 'true') { //
                    $chrecord = ChRecord::find($id); //
                    $ChEValorationOT = ChEValorationOT::select('ch_e_valoration_o_t.*')
                    ->with('ch_diagnosis')
                        ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                        ->leftJoin('ch_record', 'ch_record.id', 'ch_e_valoration_o_t.ch_record_id') //
                        ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
                }
            }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_valoration_o_t' => $ChEValorationOT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEValorationOT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEValorationOT = new ChEValorationOT;
        $ChEValorationOT->recomendations = $request->recomendations;
        $ChEValorationOT->ch_diagnosis_id = $request->ch_diagnosis_id;
        $ChEValorationOT->type_record_id = $request->type_record_id;
        $ChEValorationOT->ch_record_id = $request->ch_record_id;
        $ChEValorationOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_valoration_o_t' => $ChEValorationOT->toArray()]
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
        $ChEValorationOT = ChEValorationOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_valoration_o_t' => $ChEValorationOT]
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
        $ChEValorationOT = ChEValorationOT::find($id);
        $ChEValorationOT->recommendations = $request->recommendations;
        $ChEValorationOT->ch_diagnosis_id = $request->ch_diagnosis_id;
        $ChEValorationOT->type_record_id = $request->type_record_id;
        $ChEValorationOT->ch_record_id = $request->ch_record_id;
        $ChEValorationOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_valoration_o_t' => $ChEValorationOT]
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
            $ChEValorationOT = ChEValorationOT::find($id);
            $ChEValorationOT->delete();

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
