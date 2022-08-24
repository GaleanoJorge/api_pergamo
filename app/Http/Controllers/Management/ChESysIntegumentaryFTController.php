<?php

namespace App\Http\Controllers\Management;

use App\Models\ChESysIntegumentaryFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChESysIntegumentaryFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChESysIntegumentaryFT = ChESysIntegumentaryFT::select();


        if ($request->ch_record_id) {
            $ChESysIntegumentaryFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChESysIntegumentaryFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChESysIntegumentaryFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChESysIntegumentaryFT = $ChESysIntegumentaryFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChESysIntegumentaryFT = $ChESysIntegumentaryFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_sys_integumentary_f_t' => $ChESysIntegumentaryFT]
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


        $ChESysIntegumentaryFT = ChESysIntegumentaryFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
            
            if ($request->has_input) { //
                if ($request->has_input == 'true') { //
                    $chrecord = ChRecord::find($id); //
                    $ChESysIntegumentaryFT = ChESysIntegumentaryFT::select('ch_e_sys_integumentary_f_t.*')
                        ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                        ->leftJoin('ch_record', 'ch_record.id', 'ch_e_sys_integumentary_f_t.ch_record_id') //
                        ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
                }
            }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_sys_integumentary_f_t' => $ChESysIntegumentaryFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChESysIntegumentaryFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChESysIntegumentaryFT = new ChESysIntegumentaryFT;
        $ChESysIntegumentaryFT->colaboration = $request->colaboration;
        $ChESysIntegumentaryFT->integrity = $request->integrity;
        $ChESysIntegumentaryFT->texture = $request->texture;
        $ChESysIntegumentaryFT->sweating = $request->sweating;
        $ChESysIntegumentaryFT->elasticity = $request->elasticity;
        $ChESysIntegumentaryFT->extensibility = $request->extensibility;
        $ChESysIntegumentaryFT->mobility = $request->mobility;
        $ChESysIntegumentaryFT->scar = $request->scar;
        $ChESysIntegumentaryFT->bedsores = $request->bedsores;
        $ChESysIntegumentaryFT->location = $request->location;

        $ChESysIntegumentaryFT->type_record_id = $request->type_record_id;
        $ChESysIntegumentaryFT->ch_record_id = $request->ch_record_id;
        $ChESysIntegumentaryFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_sys_integumentary_f_t' => $ChESysIntegumentaryFT->toArray()]
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
        $ChESysIntegumentaryFT = ChESysIntegumentaryFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_sys_integumentary_f_t' => $ChESysIntegumentaryFT]
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
        $ChESysIntegumentaryFT = new ChESysIntegumentaryFT;
        $ChESysIntegumentaryFT->colaboration = $request->colaboration;
        $ChESysIntegumentaryFT->integrity = $request->integrity;
        $ChESysIntegumentaryFT->texture = $request->texture;
        $ChESysIntegumentaryFT->sweating = $request->sweating;
        $ChESysIntegumentaryFT->elasticity = $request->elasticity;
        $ChESysIntegumentaryFT->extensibility = $request->extensibility;
        $ChESysIntegumentaryFT->mobility = $request->mobility;
        $ChESysIntegumentaryFT->scar = $request->scar;
        $ChESysIntegumentaryFT->bedsores = $request->bedsores;
        $ChESysIntegumentaryFT->location = $request->location;
        
        $ChESysIntegumentaryFT->type_record_id = $request->type_record_id;
        $ChESysIntegumentaryFT->ch_record_id = $request->ch_record_id;
        $ChESysIntegumentaryFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_sys_integumentary_f_t' => $ChESysIntegumentaryFT]
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
            $ChESysIntegumentaryFT = ChESysIntegumentaryFT::find($id);
            $ChESysIntegumentaryFT->delete();

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
