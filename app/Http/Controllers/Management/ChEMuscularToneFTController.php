<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMuscularToneFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEMuscularToneFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMuscularToneFT = ChEMuscularToneFT::select();


        if ($request->ch_record_id) {
            $ChEMuscularToneFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEMuscularToneFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEMuscularToneFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEMuscularToneFT = $ChEMuscularToneFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEMuscularToneFT = $ChEMuscularToneFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_muscular_tone_f_t' => $ChEMuscularToneFT]
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


        $ChEMuscularToneFT = ChEMuscularToneFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_muscular_tone_f_t' => $ChEMuscularToneFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMuscularToneFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEMuscularToneFT = new ChEMuscularToneFT;
        $ChEMuscularToneFT->head = $request->head;
        $ChEMuscularToneFT->sup_left = $request->sup_left;
        $ChEMuscularToneFT->hand_left = $request->hand_left;
        $ChEMuscularToneFT->sup_right = $request->sup_right;
        $ChEMuscularToneFT->hand = $request->hand;
        $ChEMuscularToneFT->trunk = $request->trunk;
        $ChEMuscularToneFT->inf_left = $request->inf_left;
        $ChEMuscularToneFT->left_foot = $request->left_foot;
        $ChEMuscularToneFT->inf_right = $request->inf_right;
        $ChEMuscularToneFT->right_foot = $request->right_foot;
        $ChEMuscularToneFT->observation = $request->observation;

        $ChEMuscularToneFT->type_record_id = $request->type_record_id;
        $ChEMuscularToneFT->ch_record_id = $request->ch_record_id;
        $ChEMuscularToneFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_muscular_tone_f_t' => $ChEMuscularToneFT->toArray()]
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
        $ChEMuscularToneFT = ChEMuscularToneFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_muscular_tone_f_t' => $ChEMuscularToneFT]
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
        $ChEMuscularToneFT = new ChEMuscularToneFT;
        $ChEMuscularToneFT->colaboration = $request->colaboration;
        $ChEMuscularToneFT->integrity = $request->integrity;
        $ChEMuscularToneFT->texture = $request->texture;
        $ChEMuscularToneFT->sweating = $request->sweating;
        $ChEMuscularToneFT->elasticity = $request->elasticity;
        $ChEMuscularToneFT->extensibility = $request->extensibility;
        $ChEMuscularToneFT->mobility = $request->mobility;
        $ChEMuscularToneFT->scar = $request->scar;
        $ChEMuscularToneFT->bedsores = $request->bedsores;
        $ChEMuscularToneFT->location = $request->location;
        
        $ChEMuscularToneFT->type_record_id = $request->type_record_id;
        $ChEMuscularToneFT->ch_record_id = $request->ch_record_id;
        $ChEMuscularToneFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_muscular_tone_f_t' => $ChEMuscularToneFT]
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
            $ChEMuscularToneFT = ChEMuscularToneFT::find($id);
            $ChEMuscularToneFT->delete();

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
