<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRtInspection;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class ChRtInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRtInspection = ChRtInspection::select();

        if ($request->ch_record_id) {
            $ChRtInspection->where('ch_record_id', $request->ch_record_id);
        }

        if ($request->_sort) {
            $ChRtInspection->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRtInspection->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChRtInspection = $ChRtInspection->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChRtInspection = $ChRtInspection->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Inspección obtenida exitosamente',
            'data' => ['ch_rt_inspection' => $ChRtInspection]
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


        $ChRtInspection = ChRtInspection::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChRtInspection = ChRtInspection::select('ch_rt_inspection.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('ch_rt_inspection.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_rt_inspection.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_rt_inspection' => $ChRtInspection]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        if($request->ch_rt_inspection_class_id==1){
        $validate=ChRtInspection::where('ch_record_id', $request->ch_record_id)->where('medical_diagnosis_id',$request->medical_diagnosis_id,'ch_background_id',$request->ch_background_id,
        'ch_gynecologists_id',$request->ch_gynecologists_id)->first();
        }else{
            $validate=null;
        }
        if(!$validate){
        $ChRtInspection = new ChRtInspection;
        $ChRtInspection->expansion = $request->expansion;
        $ChRtInspection->masses = $request->masses;
        $ChRtInspection->detail_masses = $request->detail_masses;
        $ChRtInspection->crepitations = $request->crepitations;
        $ChRtInspection->fracturues = $request->fracturues;
        $ChRtInspection->detail_fracturues = $request->detail_fracturues;
        $ChRtInspection->airway = $request->airway;
        $ChRtInspection->type_record_id = $request->type_record_id;
        $ChRtInspection->ch_record_id = $request->ch_record_id;
        $ChRtInspection->save();

        return response()->json([
            'status' => true,
            'message' => 'Inspección asociada al paciente exitosamente',
            'data' => ['ch_rt_inspection' => $ChRtInspection->toArray()]
        ]);
    }else{
        return response()->json([
            'status' => false,
            'message' => 'Ya tiene un diagnostico principal asociada'
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
        $ChRtInspection = ChRtInspection::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Inspección obtenida exitosamente',
            'data' => ['ch_rt_inspection' => $ChRtInspection]
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
        $ChRtInspection = ChRtInspection::find($id);
        $ChRtInspection->expansion = $request->expansion;
        $ChRtInspection->masses = $request->masses;
        $ChRtInspection->detail_masses = $request->detail_masses;
        $ChRtInspection->crepitations = $request->crepitations;
        $ChRtInspection->fracturues = $request->fracturues;
        $ChRtInspection->detail_fracturues = $request->detail_fracturues;
        $ChRtInspection->airway = $request->airway;
        $ChRtInspection->type_record_id = $request->type_record_id;
        $ChRtInspection->ch_record_id = $request->ch_record_id;
        $ChRtInspection->save();

        return response()->json([
            'status' => true,
            'message' => 'Inspección actualizada exitosamente',
            'data' => ['ch_rt_inspection' => $ChRtInspection]
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
            $ChRtInspection = ChRtInspection::find($id);
            $ChRtInspection->delete();

            return response()->json([
                'status' => true,
                'message' => 'Inspección eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Inspección en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
