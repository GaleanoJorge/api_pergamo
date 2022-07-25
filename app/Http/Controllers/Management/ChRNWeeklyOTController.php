<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRNWeeklyOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChRNWeeklyOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
         $ChRNWeeklyOT = ChRNWeeklyOT::with('ch_r_n_weekly_o_t');
        // if($request->ch_record_id){
        //     $ChRNWeeklyOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id',3);
        // }  


        if ($request->_sort) {
            $ChRNWeeklyOT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRNWeeklyOT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRNWeeklyOT = $ChRNWeeklyOT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRNWeeklyOT = $ChRNWeeklyOT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT]
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
        $ChRNWeeklyOT = ChRNWeeklyOT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
        ->with('ch_r_n_weekly_o_t')->get()->toArray();            

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validate = ChRNWeeklyOT::select('ch_r_n_weekly_o_t.*')->where('ch_record_id', $request->ch_record_id)
        ->where('type_record_id', $request->type_record_id)
        ->get()->toArray();
         $validate=ChRNWeeklyOT::where('ch_record_id', $request->ch_record_id)->where('ch_r_n_weekly_o_t',$request->ch_r_n_weekly_o_t)->first();
         if(!$validate){

        $ChRNWeeklyOT = new ChRNWeeklyOT;

        $ChRNWeeklyOT->monthly_sessions = $request-> monthly_sessions; 
        $ChRNWeeklyOT->weekly_intensity = $request-> weekly_intensity;
        $ChRNWeeklyOT->recomendations = $request-> recomendations; 

        $ChRNWeeklyOT->type_record_id = $request->type_record_id;
        $ChRNWeeklyOT->ch_record_id = $request->ch_record_id;
        $ChRNWeeklyOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT->toArray()]
        ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Ya tiene observación'
            ], 423);
        }


    }

    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChRNWeeklyOT = ChRNWeeklyOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT]
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
        $ChRNWeeklyOT = ChRNWeeklyOT::find($id);
        

        $ChRNWeeklyOT->monthly_sessions = $request-> monthly_sessions; 
        $ChRNWeeklyOT->weekly_intensity = $request-> weekly_intensity;
        $ChRNWeeklyOT->recomendations = $request-> recomendations; 

        $ChRNWeeklyOT->type_record_id = $request->type_record_id;
        $ChRNWeeklyOT->ch_record_id = $request->ch_record_id;
        $ChRNWeeklyOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_r_n_weekly_o_t' => $ChRNWeeklyOT]
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
            $ChRNWeeklyOT = ChRNWeeklyOT::find($id);
            $ChRNWeeklyOT->delete();

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
