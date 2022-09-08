<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEPositionFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEPositionFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEPositionFT = ChEPositionFT::select();


        if ($request->ch_record_id) {
            $ChEPositionFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEPositionFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEPositionFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEPositionFT = $ChEPositionFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEPositionFT = $ChEPositionFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_position_f_t' => $ChEPositionFT]
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request,int $id, int $type_record_id): JsonResponse
    {


        $ChEPositionFT = ChEPositionFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();

            if ($request->has_input) { //
                if ($request->has_input == 'true') { //
                    $chrecord = ChRecord::find($id); //
                    $ChEPositionFT = ChEPositionFT::select('ch_e_position_f_t.*')
                        ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                        ->leftJoin('ch_record', 'ch_record.id', 'ch_e_position_f_t.ch_record_id') //
                        ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
                }
            }
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_position_f_t' => $ChEPositionFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEPositionFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEPositionFT = new ChEPositionFT;
        $ChEPositionFT->front_view = $request->front_view;
        $ChEPositionFT->right_view = $request->right_view;
        $ChEPositionFT->left_view = $request->left_view;
        $ChEPositionFT->rear_view = $request->rear_view;

        $ChEPositionFT->type_record_id = $request->type_record_id;
        $ChEPositionFT->ch_record_id = $request->ch_record_id;
        $ChEPositionFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_position_f_t' => $ChEPositionFT->toArray()]
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
        $ChEPositionFT = ChEPositionFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_position_f_t' => $ChEPositionFT]
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
        $ChEPositionFT = new ChEPositionFT;
        $ChEPositionFT->front_view = $request->front_view;
        $ChEPositionFT->right_view = $request->right_view;
        $ChEPositionFT->left_view = $request->left_view;
        $ChEPositionFT->rear_view = $request->rear_view;
        
        $ChEPositionFT->type_record_id = $request->type_record_id;
        $ChEPositionFT->ch_record_id = $request->ch_record_id;
        $ChEPositionFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_position_f_t' => $ChEPositionFT]
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
            $ChEPositionFT = ChEPositionFT::find($id);
            $ChEPositionFT->delete();

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
