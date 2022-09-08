<?php

namespace App\Http\Controllers\Management;

use App\Models\ChESysMusculoskeletalFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChESysMusculoskeletalFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChESysMusculoskeletalFT = ChESysMusculoskeletalFT::select();


        if ($request->ch_record_id) {
            $ChESysMusculoskeletalFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChESysMusculoskeletalFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChESysMusculoskeletalFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChESysMusculoskeletalFT = $ChESysMusculoskeletalFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChESysMusculoskeletalFT = $ChESysMusculoskeletalFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_sys_musculoskeletal_f_t' => $ChESysMusculoskeletalFT]
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


        $ChESysMusculoskeletalFT = ChESysMusculoskeletalFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();

            if ($request->has_input) { //
                if ($request->has_input == 'true') { //
                    $chrecord = ChRecord::find($id); //
                    $ChESysMusculoskeletalFT = ChESysMusculoskeletalFT::select('ch_e_sys_musculoskeletal_f_t.*')
                        ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                        ->leftJoin('ch_record', 'ch_record.id', 'ch_e_sys_musculoskeletal_f_t.ch_record_id') //
                        ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
                }
            }
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_sys_musculoskeletal_f_t' => $ChESysMusculoskeletalFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChESysMusculoskeletalFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChESysMusculoskeletalFT = new ChESysMusculoskeletalFT;
        $ChESysMusculoskeletalFT->head = $request->head;
        $ChESysMusculoskeletalFT->sup_left = $request->sup_left;
        $ChESysMusculoskeletalFT->hand_left = $request->hand_left;
        $ChESysMusculoskeletalFT->sup_right = $request->sup_right;
        $ChESysMusculoskeletalFT->hand = $request->hand;
        $ChESysMusculoskeletalFT->trunk = $request->trunk;
        $ChESysMusculoskeletalFT->inf_left = $request->inf_left;
        $ChESysMusculoskeletalFT->left_foot = $request->left_foot;
        $ChESysMusculoskeletalFT->inf_right = $request->inf_right;
        $ChESysMusculoskeletalFT->right_foot = $request->right_foot;
        $ChESysMusculoskeletalFT->observation = $request->observation;

        $ChESysMusculoskeletalFT->type_record_id = $request->type_record_id;
        $ChESysMusculoskeletalFT->ch_record_id = $request->ch_record_id;
        $ChESysMusculoskeletalFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_sys_musculoskeletal_f_t' => $ChESysMusculoskeletalFT->toArray()]
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
        $ChESysMusculoskeletalFT = ChESysMusculoskeletalFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_sys_musculoskeletal_f_t' => $ChESysMusculoskeletalFT]
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
        $ChESysMusculoskeletalFT = new ChESysMusculoskeletalFT;
        $ChESysMusculoskeletalFT->colaboration = $request->colaboration;
        $ChESysMusculoskeletalFT->integrity = $request->integrity;
        $ChESysMusculoskeletalFT->texture = $request->texture;
        $ChESysMusculoskeletalFT->sweating = $request->sweating;
        $ChESysMusculoskeletalFT->elasticity = $request->elasticity;
        $ChESysMusculoskeletalFT->extensibility = $request->extensibility;
        $ChESysMusculoskeletalFT->mobility = $request->mobility;
        $ChESysMusculoskeletalFT->scar = $request->scar;
        $ChESysMusculoskeletalFT->bedsores = $request->bedsores;
        $ChESysMusculoskeletalFT->location = $request->location;
        
        $ChESysMusculoskeletalFT->type_record_id = $request->type_record_id;
        $ChESysMusculoskeletalFT->ch_record_id = $request->ch_record_id;
        $ChESysMusculoskeletalFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_sys_musculoskeletal_f_t' => $ChESysMusculoskeletalFT]
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
            $ChESysMusculoskeletalFT = ChESysMusculoskeletalFT::find($id);
            $ChESysMusculoskeletalFT->delete();

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
