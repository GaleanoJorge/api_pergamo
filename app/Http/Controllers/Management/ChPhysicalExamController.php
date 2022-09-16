<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPhysicalExam;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPhysicalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPhysicalExam = ChPhysicalExam::select('ch_physical_exam.*');

        if ($request->_sort) {
            $ChPhysicalExam->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPhysicalExam->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPhysicalExam = $ChPhysicalExam->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPhysicalExam = $ChPhysicalExam->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Examen físico obtenidos exitosamente',
            'data' => ['ch_physical_exam' => $ChPhysicalExam]
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


        $ChPhysicalExam = ChPhysicalExam::where('ch_record_id', $id)->where('type_record_id', $type_record_id)->with('type_ch_physical_exam')
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChPhysicalExam = ChPhysicalExam::with('type_ch_physical_exam')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id)
                    ->where('ch_physical_exam.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_physical_exam.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }


        return response()->json([
            'status' => true,
            'message' => 'Examen físico obtenido exitosamente',
            'data' => ['ch_physical_exam' => $ChPhysicalExam]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validate = ChPhysicalExam::select('ch_physical_exam.*')
            ->where('ch_record_id', $request->ch_record_id)
            ->where('type_record_id', $request->type_record_id)
            ->get()->toArray();
        // ('ch_record_id', $request->ch_record_id)->where('type_ch_physical_exam_id',$request->type_ch_physical_exam_id)->first();
        if (sizeof($validate) == 0) {

            $ChPhysicalExamArray = json_decode($request->physical_exam);

            foreach ($ChPhysicalExamArray as $item) {

                $ChPhysicalExam = new ChPhysicalExam;
                $ChPhysicalExam->revision = $item->revision;
                $ChPhysicalExam->type_ch_physical_exam_id = $item->id;
                $ChPhysicalExam->description = $item->description;
                $ChPhysicalExam->type_record_id = $request->type_record_id;
                $ChPhysicalExam->ch_record_id = $request->ch_record_id;
                $ChPhysicalExam->save();
                
            }


            return response()->json([
                'status' => true,
                'message' => 'Examenes físicos asociados al paciente exitosamente',
                'data' => ['ch_physical_exam' => $ChPhysicalExam->toArray()]
            ]);
        } else {
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
        $ChPhysicalExam = ChPhysicalExam::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Examen físico obtenido exitosamente',
            'data' => ['ch_physical_exam' => $ChPhysicalExam]
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
        $ChPhysicalExam = ChPhysicalExam::find($id);
        $ChPhysicalExam->revision = $request->revision;
        $ChPhysicalExam->type_ch_physical_exam_id = $request->type_ch_physical_exam_id;
        $ChPhysicalExam->type_record_id = $request->type_record_id;
        $ChPhysicalExam->ch_record_id = $request->ch_record_id;
        $ChPhysicalExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Examen físico actualizado exitosamente',
            'data' => ['ch_physical_exam' => $ChPhysicalExam]
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
            $ChPhysicalExam = ChPhysicalExam::find($id);
            $ChPhysicalExam->delete();

            return response()->json([
                'status' => true,
                'message' => 'Examen físico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Examen físico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
