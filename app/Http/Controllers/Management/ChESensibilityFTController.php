<?php

namespace App\Http\Controllers\Management;

use App\Models\ChESensibilityFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChESensibilityFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChESensibilityFT = ChESensibilityFT::select();


        if ($request->ch_record_id) {
            $ChESensibilityFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChESensibilityFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChESensibilityFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChESensibilityFT = $ChESensibilityFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChESensibilityFT = $ChESensibilityFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_sensibility_f_t' => $ChESensibilityFT]
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


        $ChESensibilityFT = ChESensibilityFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
            
            if ($request->has_input) { //
                if ($request->has_input == 'true') { //
                    $chrecord = ChRecord::find($id); //
                    $ChESensibilityFT = ChESensibilityFT::select('ch_e_sensibility_f_t.*')
                        ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                        ->where('ch_e_sensibility_f_t.type_record_id', 1)
                        ->leftJoin('ch_record', 'ch_record.id', 'ch_e_sensibility_f_t.ch_record_id') //
                        ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
                }
            }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_sensibility_f_t' => $ChESensibilityFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChESensibilityFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChESensibilityFT = new ChESensibilityFT;
        $ChESensibilityFT->deep = $request->deep;
        $ChESensibilityFT->superficial = $request->superficial;
        $ChESensibilityFT->cortical = $request->cortical;
        $ChESensibilityFT->observation = $request->observation;

        $ChESensibilityFT->type_record_id = $request->type_record_id;
        $ChESensibilityFT->ch_record_id = $request->ch_record_id;
        $ChESensibilityFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_sensibility_f_t' => $ChESensibilityFT->toArray()]
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
        $ChESensibilityFT = ChESensibilityFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_sensibility_f_t' => $ChESensibilityFT]
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
        $ChESensibilityFT = new ChESensibilityFT;
        $ChESensibilityFT->deep = $request->deep;
        $ChESensibilityFT->superficial = $request->superficial;
        $ChESensibilityFT->cortical = $request->cortical;
        $ChESensibilityFT->observation = $request->observation;
        
        $ChESensibilityFT->type_record_id = $request->type_record_id;
        $ChESensibilityFT->ch_record_id = $request->ch_record_id;
        $ChESensibilityFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_sensibility_f_t' => $ChESensibilityFT]
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
            $ChESensibilityFT = ChESensibilityFT::find($id);
            $ChESensibilityFT->delete();

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
