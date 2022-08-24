<?php

namespace App\Http\Controllers\Management;

use App\Models\ChEMSWeeklyOT;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChRecord;
use Illuminate\Database\QueryException;

class ChEMSWeeklyOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChEMSWeeklyOT = ChEMSWeeklyOT::select();

        if ($request->ch_record_id) {
            $ChEMSWeeklyOT->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChEMSWeeklyOT->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChEMSWeeklyOT->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChEMSWeeklyOT = $ChEMSWeeklyOT->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChEMSWeeklyOT = $ChEMSWeeklyOT->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_weekly_o_t' => $ChEMSWeeklyOT]
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


        $ChEMSWeeklyOT = ChEMSWeeklyOT::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChEMSWeeklyOT = ChEMSWeeklyOT::select('ch_e_m_s_weekly_o_t.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_e_m_s_weekly_o_t.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_e_m_s_weekly_o_t' => $ChEMSWeeklyOT]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        // $validate=ChEMSWeeklyOT::where('ch_record_id', $request->ch_record_id)->where('type_record_id', $request->type_record_id);

        // if(!$validate){
        $ChEMSWeeklyOT = new ChEMSWeeklyOT;
        $ChEMSWeeklyOT->monthly_sessions = $request->monthly_sessions;
        $ChEMSWeeklyOT->weekly_intensity = $request->weekly_intensity;
        $ChEMSWeeklyOT->recommendations = $request->recommendations;

        $ChEMSWeeklyOT->type_record_id = $request->type_record_id;
        $ChEMSWeeklyOT->ch_record_id = $request->ch_record_id;
        $ChEMSWeeklyOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion asociados al paciente exitosamente',
            'data' => ['ch_e_m_s_weekly_o_t' => $ChEMSWeeklyOT->toArray()]
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
        $ChEMSWeeklyOT = ChEMSWeeklyOT::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenido exitosamente',
            'data' => ['ch_e_m_s_weekly_o_t' => $ChEMSWeeklyOT]
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
        $ChEMSWeeklyOT = ChEMSWeeklyOT::find($id);
        $ChEMSWeeklyOT->monthly_sessions = $request->monthly_sessions;
        $ChEMSWeeklyOT->weekly_intensity = $request->weekly_intensity;
        $ChEMSWeeklyOT->recommendations = $request->recommendations;

        $ChEMSWeeklyOT->type_record_id = $request->type_record_id;
        $ChEMSWeeklyOT->ch_record_id = $request->ch_record_id;
        $ChEMSWeeklyOT->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoracion actualizado exitosamente',
            'data' => ['ch_e_m_s_weekly_o_t' => $ChEMSWeeklyOT]
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
            $ChEMSWeeklyOT = ChEMSWeeklyOT::find($id);
            $ChEMSWeeklyOT->delete();

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
