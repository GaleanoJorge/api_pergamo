<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEBalanceFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEBalanceFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEBalanceFT = ChEBalanceFT::select();


        if ($request->ch_record_id) {
            $ChEBalanceFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEBalanceFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEBalanceFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEBalanceFT = $ChEBalanceFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEBalanceFT = $ChEBalanceFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_balance_f_t' => $ChEBalanceFT]
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


        $ChEBalanceFT = ChEBalanceFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_balance_f_t' => $ChEBalanceFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEBalanceFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEBalanceFT = new ChEBalanceFT;
        $ChEBalanceFT->static = $request->static;
        $ChEBalanceFT->dinamic = $request->dinamic;
        $ChEBalanceFT->observation = $request->observation;

        $ChEBalanceFT->type_record_id = $request->type_record_id;
        $ChEBalanceFT->ch_record_id = $request->ch_record_id;
        $ChEBalanceFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_balance_f_t' => $ChEBalanceFT->toArray()]
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
        $ChEBalanceFT = ChEBalanceFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_balance_f_t' => $ChEBalanceFT]
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
        $ChEBalanceFT = new ChEBalanceFT;
        $ChEBalanceFT->static = $request->static;
        $ChEBalanceFT->dinamic = $request->dinamic;
        $ChEBalanceFT->observation = $request->observation;
        
        $ChEBalanceFT->type_record_id = $request->type_record_id;
        $ChEBalanceFT->ch_record_id = $request->ch_record_id;
        $ChEBalanceFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_balance_f_t' => $ChEBalanceFT]
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
            $ChEBalanceFT = ChEBalanceFT::find($id);
            $ChEBalanceFT->delete();

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