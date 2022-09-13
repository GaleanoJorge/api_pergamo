<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMuscularStrengthFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMuscularStrengthFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMuscularStrengthFT = ChEMuscularStrengthFT::select();


        if ($request->ch_record_id) {
            $ChEMuscularStrengthFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEMuscularStrengthFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEMuscularStrengthFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEMuscularStrengthFT = $ChEMuscularStrengthFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEMuscularStrengthFT = $ChEMuscularStrengthFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_muscular_strength_f_t' => $ChEMuscularStrengthFT]
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


        $ChEMuscularStrengthFT = ChEMuscularStrengthFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();

            if ($request->has_input) { //
                if ($request->has_input == 'true') { //
                    $chrecord = ChRecord::find($id); //
                    $ChEMuscularStrengthFT = ChEMuscularStrengthFT::select('ch_e_muscular_strength_f_t.*')
                        ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                        ->where('ch_e_muscular_strength_f_t.type_record_id', 1)
                        ->leftJoin('ch_record', 'ch_record.id', 'ch_e_muscular_strength_f_t.ch_record_id') //
                        ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
                }
            }
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_muscular_strength_f_t' => $ChEMuscularStrengthFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMuscularStrengthFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEMuscularStrengthFT = new ChEMuscularStrengthFT;
        $ChEMuscularStrengthFT->head = $request->head;
        $ChEMuscularStrengthFT->sup_left = $request->sup_left;
        $ChEMuscularStrengthFT->hand_left = $request->hand_left;
        $ChEMuscularStrengthFT->sup_right = $request->sup_right;
        $ChEMuscularStrengthFT->hand = $request->hand;
        $ChEMuscularStrengthFT->trunk = $request->trunk;
        $ChEMuscularStrengthFT->inf_left = $request->inf_left;
        $ChEMuscularStrengthFT->left_foot = $request->left_foot;
        $ChEMuscularStrengthFT->inf_right = $request->inf_right;
        $ChEMuscularStrengthFT->right_foot = $request->right_foot;

        $ChEMuscularStrengthFT->type_record_id = $request->type_record_id;
        $ChEMuscularStrengthFT->ch_record_id = $request->ch_record_id;
        $ChEMuscularStrengthFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_muscular_strength_f_t' => $ChEMuscularStrengthFT->toArray()]
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
        $ChEMuscularStrengthFT = ChEMuscularStrengthFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_muscular_strength_f_t' => $ChEMuscularStrengthFT]
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
        $ChEMuscularStrengthFT = new ChEMuscularStrengthFT;
        $ChEMuscularStrengthFT->head = $request->head;
        $ChEMuscularStrengthFT->sup_left = $request->sup_left;
        $ChEMuscularStrengthFT->hand_left = $request->hand_left;
        $ChEMuscularStrengthFT->sup_right = $request->sup_right;
        $ChEMuscularStrengthFT->hand = $request->hand;
        $ChEMuscularStrengthFT->trunk = $request->trunk;
        $ChEMuscularStrengthFT->inf_left = $request->inf_left;
        $ChEMuscularStrengthFT->left_foot = $request->left_foot;
        $ChEMuscularStrengthFT->inf_right = $request->inf_right;
        $ChEMuscularStrengthFT->right_foot = $request->right_foot;
        
        $ChEMuscularStrengthFT->type_record_id = $request->type_record_id;
        $ChEMuscularStrengthFT->ch_record_id = $request->ch_record_id;
        $ChEMuscularStrengthFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_muscular_strength_f_t' => $ChEMuscularStrengthFT]
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
            $ChEMuscularStrengthFT = ChEMuscularStrengthFT::find($id);
            $ChEMuscularStrengthFT->delete();

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
