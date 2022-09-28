<?php

namespace App\Http\Controllers\Management;

use App\Models\ChNRMaterialsFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChNRMaterialsFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChNRMaterialsFT = ChNRMaterialsFT::select();
        if($request->ch_record_id){
            $ChNRMaterialsFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',3);
        }  


        if ($request->_sort) {
            $ChNRMaterialsFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChNRMaterialsFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChNRMaterialsFT = $ChNRMaterialsFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChNRMaterialsFT = $ChNRMaterialsFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_n_r_materials_f_t' => $ChNRMaterialsFT]
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
        $ChNRMaterialsFT = ChNRMaterialsFT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_n_r_materials_f_t' => $ChNRMaterialsFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
    
        $ChNRMaterialsFT = new ChNRMaterialsFT;

        $ChNRMaterialsFT->Material_1 = $request->  Material_1; 
        $ChNRMaterialsFT->Material_2 = $request->  Material_2;
        $ChNRMaterialsFT->Material_3 = $request->  Material_3; 
        $ChNRMaterialsFT->Material_4 = $request->  Material_4; 
        $ChNRMaterialsFT->Material_5 = $request->  Material_5;
        $ChNRMaterialsFT->Material_6 = $request->  Material_6; 
        $ChNRMaterialsFT->Material_7 = $request->  Material_7; 
        $ChNRMaterialsFT->Material_8 = $request->  Material_8;
        $ChNRMaterialsFT->Material_9 = $request->  Material_9; 
        $ChNRMaterialsFT->Material_10 = $request-> Material_10; 
        $ChNRMaterialsFT->Material_11 = $request-> Material_11; 
        $ChNRMaterialsFT->Material_12 = $request-> Material_12;
        $ChNRMaterialsFT->Material_13 = $request-> Material_13; 
        $ChNRMaterialsFT->Material_14 = $request-> Material_14; 
        $ChNRMaterialsFT->Material_15 = $request-> Material_15;
        $ChNRMaterialsFT->Material_16 = $request-> Material_16; 
        $ChNRMaterialsFT->Material_17 = $request-> Material_17; 
        $ChNRMaterialsFT->Material_18 = $request-> Material_18;
        $ChNRMaterialsFT->Material_19 = $request-> Material_19; 
        $ChNRMaterialsFT->Material_20 = $request-> Material_20; 
        $ChNRMaterialsFT->Material_21 = $request-> Material_21; 
        $ChNRMaterialsFT->Material_22 = $request-> Material_22;
        $ChNRMaterialsFT->Material_23 = $request-> Material_23; 
        $ChNRMaterialsFT->Material_24 = $request-> Material_24; 
        $ChNRMaterialsFT->Material_25 = $request-> Material_25;
        $ChNRMaterialsFT->Material_26 = $request-> Material_26; 
        $ChNRMaterialsFT->Material_27 = $request-> Material_27; 
        $ChNRMaterialsFT->Material_28 = $request-> Material_28;
        $ChNRMaterialsFT->Material_29 = $request-> Material_29; 

        $ChNRMaterialsFT->type_record_id = $request->type_record_id;
        $ChNRMaterialsFT->ch_record_id = $request->ch_record_id;
        $ChNRMaterialsFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_n_r_materials_f_t' => $ChNRMaterialsFT->toArray()]
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
        $ChNRMaterialsFT = ChNRMaterialsFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_n_r_materials_f_t' => $ChNRMaterialsFT]
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
        $ChNRMaterialsFT = ChNRMaterialsFT::find($id);
        
        $ChNRMaterialsFT->Material_1 = $request->  Material_1; 
        $ChNRMaterialsFT->Material_2 = $request->  Material_2;
        $ChNRMaterialsFT->Material_3 = $request->  Material_3; 
        $ChNRMaterialsFT->Material_4 = $request->  Material_4; 
        $ChNRMaterialsFT->Material_5 = $request->  Material_5;
        $ChNRMaterialsFT->Material_6 = $request->  Material_6; 
        $ChNRMaterialsFT->Material_7 = $request->  Material_7; 
        $ChNRMaterialsFT->Material_8 = $request->  Material_8;
        $ChNRMaterialsFT->Material_9 = $request->  Material_9; 
        $ChNRMaterialsFT->Material_10 = $request-> Material_10; 
        $ChNRMaterialsFT->Material_11 = $request-> Material_11; 
        $ChNRMaterialsFT->Material_12 = $request-> Material_12;
        $ChNRMaterialsFT->Material_13 = $request-> Material_13; 
        $ChNRMaterialsFT->Material_14 = $request-> Material_14; 
        $ChNRMaterialsFT->Material_15 = $request-> Material_15;
        $ChNRMaterialsFT->Material_16 = $request-> Material_16; 
        $ChNRMaterialsFT->Material_17 = $request-> Material_17; 
        $ChNRMaterialsFT->Material_18 = $request-> Material_18;
        $ChNRMaterialsFT->Material_19 = $request-> Material_19; 
        $ChNRMaterialsFT->Material_20 = $request-> Material_20; 
        $ChNRMaterialsFT->Material_21 = $request-> Material_21; 
        $ChNRMaterialsFT->Material_22 = $request-> Material_22;
        $ChNRMaterialsFT->Material_23 = $request-> Material_23; 
        $ChNRMaterialsFT->Material_24 = $request-> Material_24; 
        $ChNRMaterialsFT->Material_25 = $request-> Material_25;
        $ChNRMaterialsFT->Material_26 = $request-> Material_26; 
        $ChNRMaterialsFT->Material_27 = $request-> Material_27; 
        $ChNRMaterialsFT->Material_28 = $request-> Material_28;
        $ChNRMaterialsFT->Material_29 = $request-> Material_29;  

        $ChNRMaterialsFT->type_record_id = $request->type_record_id;
        $ChNRMaterialsFT->ch_record_id = $request->ch_record_id;
        $ChNRMaterialsFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_n_r_materials_f_t' => $ChNRMaterialsFT]
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
            $ChNRMaterialsFT = ChNRMaterialsFT::find($id);
            $ChNRMaterialsFT->delete();

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
