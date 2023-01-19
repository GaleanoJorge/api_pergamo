<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMarchFT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMarchFTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMarchFT = ChEMarchFT::select();


        if ($request->ch_record_id) {
            $ChEMarchFT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEMarchFT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEMarchFT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEMarchFT = $ChEMarchFT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEMarchFT = $ChEMarchFT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_march_f_t' => $ChEMarchFT]
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


        $ChEMarchFT = ChEMarchFT::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();

            if ($request->has_input) { //
                if ($request->has_input == 'true') { //
                    $chrecord = ChRecord::find($id); //
                    $ChEMarchFT = ChEMarchFT::select('ch_e_march_f_t.*')
                        ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                        ->where('ch_e_march_f_t.type_record_id', 1)
                        ->leftJoin('ch_record', 'ch_record.id', 'ch_e_march_f_t.ch_record_id') //
                        ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
                }
            }
            


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_march_f_t' => $ChEMarchFT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMarchFT::where('ch_record_id', $request->ch_record_id)->where('ch_diagnosis_id',$request->ch_diagnosis)->first();
        // if(!$validate){
        $ChEMarchFT = new ChEMarchFT;
        $ChEMarchFT->independent = $request->independent;
        $ChEMarchFT->help = $request->help;
        $ChEMarchFT->spastic = $request->spastic;
        $ChEMarchFT->ataxic = $request->ataxic;
        $ChEMarchFT->contact = $request->contact;
        $ChEMarchFT->response = $request->response;
        $ChEMarchFT->support_init = $request->support_init;
        $ChEMarchFT->support_finish = $request->support_finish;
        $ChEMarchFT->prebalance = $request->prebalance;
        $ChEMarchFT->medium_balance = $request->medium_balance;
        $ChEMarchFT->finish_balance = $request->finish_balance;
        $ChEMarchFT->observation = $request->observation;

        $ChEMarchFT->type_record_id = $request->type_record_id;
        $ChEMarchFT->ch_record_id = $request->ch_record_id;
        $ChEMarchFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_march_f_t' => $ChEMarchFT->toArray()]
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
        $ChEMarchFT = ChEMarchFT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_march_f_t' => $ChEMarchFT]
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
        $ChEMarchFT = new ChEMarchFT;
        $ChEMarchFT->independent = $request->independent;
        $ChEMarchFT->help = $request->help;
        $ChEMarchFT->spastic = $request->spastic;
        $ChEMarchFT->ataxic = $request->ataxic;
        $ChEMarchFT->contact = $request->contact;
        $ChEMarchFT->response = $request->response;
        $ChEMarchFT->support_init = $request->support_init;
        $ChEMarchFT->support_finish = $request->support_finish;
        $ChEMarchFT->prebalance = $request->prebalance;
        $ChEMarchFT->medium_balance = $request->medium_balance;
        $ChEMarchFT->finish_balance = $request->finish_balance;
        $ChEMarchFT->observation = $request->observation;
        
        $ChEMarchFT->type_record_id = $request->type_record_id;
        $ChEMarchFT->ch_record_id = $request->ch_record_id;
        $ChEMarchFT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_march_f_t' => $ChEMarchFT]
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
            $ChEMarchFT = ChEMarchFT::find($id);
            $ChEMarchFT->delete();

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
