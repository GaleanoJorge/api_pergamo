<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSystemExam;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSystemExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSystemExam = ChSystemExam::with('type_ch_system_exam');

        if ($request->ch_record_id) {
            $ChSystemExam->where('ch_record_id', $request->ch_record_id)->where('type_record_id', 1);
        }

        if ($request->_sort) {
            $ChSystemExam->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSystemExam->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSystemExam = $ChSystemExam->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSystemExam = $ChSystemExam->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema obtenidos exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
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


        $ChSystemExam = ChSystemExam::select('ch_system_exam.*')
            ->with('type_ch_system_exam')
            ->where('ch_record_id', $id)
            ->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChSystemExam = ChSystemExam::select('ch_system_exam.*')
                    ->with('type_ch_system_exam')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id)
                    ->where('ch_system_exam.type_record_id', 1)
                ->leftJoin('ch_record', 'ch_record.id', 'ch_system_exam.ch_record_id') //
                ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }


        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema obtenido exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $type_ch_system_exam = json_decode($request->type_ch_system_exam_id);
        // $validate = ChBackground::where('ch_record_id', $request->ch_record_id)->where('ch_type_background_id', $request->ch_type_background_id)->first();
        // if (!$validate) {
            foreach($type_ch_system_exam as $element) {
                    $ChSystemExam = new ChSystemExam;
                    $ChSystemExam->type_ch_system_exam_id = $element->id;
                    $ChSystemExam->revision = $element->revision;
                    $ChSystemExam->observation = $element->description;
                    $ChSystemExam->type_record_id = $request->type_record_id;
                    $ChSystemExam->ch_record_id = $request->ch_record_id;
                    $ChSystemExam->save();
                } 

        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Ya tiene observación'
        //     ], 423);
        // }
        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema obtenido exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $ChSystemExam = ChSystemExam::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema obtenido exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
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
        $ChSystemExam = ChSystemExam::find($id);
        $ChSystemExam->revision = $request->revision;
        $ChSystemExam->observation = $request->observation;
        $ChSystemExam->type_ch_system_exam_id = $request->type_ch_system_exam_id;
        $ChSystemExam->type_record_id = $request->type_record_id;
        $ChSystemExam->ch_record_id = $request->ch_record_id;
        $ChSystemExam->save();

        return response()->json([
            'status' => true,
            'message' => 'Revisión Por  Sistema actualizado exitosamente',
            'data' => ['ch_system_exam' => $ChSystemExam]
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
            $ChSystemExam = ChSystemExam::find($id);
            $ChSystemExam->delete();

            return response()->json([
                'status' => true,
                'message' => 'Revisión Por  Sistema eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Revisión Por  Sistema en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
