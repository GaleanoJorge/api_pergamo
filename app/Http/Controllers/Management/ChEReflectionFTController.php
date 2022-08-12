<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEReflectionFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChEReflectionFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEReflectionFT = ChEReflectionFT::select();


        if ($request->ch_record_id) {
            $ChEReflectionFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEReflectionFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEReflectionFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEReflectionFT = $ChEReflectionFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEReflectionFT = $ChEReflectionFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_reflection_f_t' => $ChEReflectionFT]
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


        $ChEReflectionFT = ChEReflectionFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_reflection_f_t' => $ChEReflectionFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEReflectionFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEReflectionFT = new ChEReflectionFT;
        $ChEReflectionFT->bicipital = $request->bicipital;
        $ChEReflectionFT->radial = $request->radial;
        $ChEReflectionFT->triceps = $request->triceps;
        $ChEReflectionFT->patellar = $request->patellar;
        $ChEReflectionFT->aquilano = $request->aquilano;
        $ChEReflectionFT->reflexes = $request->reflexes;
        $ChEReflectionFT->observation = $request->observation;

        $ChEReflectionFT->type_record_id = $request->type_record_id;
        $ChEReflectionFT->ch_record_id = $request->ch_record_id;
        $ChEReflectionFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_reflection_f_t' => $ChEReflectionFT->toArray()]
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
        $ChEReflectionFT = ChEReflectionFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_reflection_f_t' => $ChEReflectionFT]
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
        $ChEReflectionFT = new ChEReflectionFT;
        $ChEReflectionFT->bicipital = $request->bicipital;
        $ChEReflectionFT->radial = $request->radial;
        $ChEReflectionFT->triceps = $request->triceps;
        $ChEReflectionFT->patellar = $request->patellar;
        $ChEReflectionFT->aquilano = $request->aquilano;
        $ChEReflectionFT->reflexes = $request->reflexes;
        $ChEReflectionFT->observation = $request->observation;
        
        $ChEReflectionFT->type_record_id = $request->type_record_id;
        $ChEReflectionFT->ch_record_id = $request->ch_record_id;
        $ChEReflectionFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_reflection_f_t' => $ChEReflectionFT]
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
            $ChEReflectionFT = ChEReflectionFT::find($id);
            $ChEReflectionFT->delete();

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
