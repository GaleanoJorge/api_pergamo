<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEFlexibilityFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEFlexibilityFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEFlexibilityFT = ChEFlexibilityFT::select();


        if ($request->ch_record_id) {
            $ChEFlexibilityFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEFlexibilityFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEFlexibilityFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEFlexibilityFT = $ChEFlexibilityFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEFlexibilityFT = $ChEFlexibilityFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_flexibility_f_t' => $ChEFlexibilityFT]
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


        $ChEFlexibilityFT = ChEFlexibilityFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_flexibility_f_t' => $ChEFlexibilityFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEFlexibilityFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEFlexibilityFT = new ChEFlexibilityFT;
        $ChEFlexibilityFT->head = $request->head;
        $ChEFlexibilityFT->trunk = $request->trunk;
        $ChEFlexibilityFT->sup_right = $request->sup_right;
        $ChEFlexibilityFT->sup_left = $request->sup_left;
        $ChEFlexibilityFT->inf_right = $request->inf_right;
        $ChEFlexibilityFT->inf_left = $request->inf_left;
        $ChEFlexibilityFT->observation = $request->observation;

        $ChEFlexibilityFT->type_record_id = $request->type_record_id;
        $ChEFlexibilityFT->ch_record_id = $request->ch_record_id;
        $ChEFlexibilityFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_flexibility_f_t' => $ChEFlexibilityFT->toArray()]
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
        $ChEFlexibilityFT = ChEFlexibilityFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_flexibility_f_t' => $ChEFlexibilityFT]
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
        $ChEFlexibilityFT = new ChEFlexibilityFT;
        $ChEFlexibilityFT->head = $request->head;
        $ChEFlexibilityFT->trunk = $request->trunk;
        $ChEFlexibilityFT->sup_right = $request->sup_right;
        $ChEFlexibilityFT->sup_left = $request->sup_left;
        $ChEFlexibilityFT->inf_right = $request->inf_right;
        $ChEFlexibilityFT->inf_left = $request->inf_left;
        $ChEFlexibilityFT->observation = $request->observation;
        
        $ChEFlexibilityFT->type_record_id = $request->type_record_id;
        $ChEFlexibilityFT->ch_record_id = $request->ch_record_id;
        $ChEFlexibilityFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_flexibility_f_t' => $ChEFlexibilityFT]
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
            $ChEFlexibilityFT = ChEFlexibilityFT::find($id);
            $ChEFlexibilityFT->delete();

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