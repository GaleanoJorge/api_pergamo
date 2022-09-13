<?php

namespace App\Http\Controllers\Management;

use App\Models\HearingTl;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class HearingTlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $HearingTl = HearingTl::select();

        if ($request->_sort) {
            $HearingTl->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $HearingTl->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $HearingTl = $HearingTl->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $HearingTl = $HearingTl->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Audición obtenidos exitosamente',
            'data' => ['hearing_tl' => $HearingTl]
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


        $HearingTl = HearingTl::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $HearingTl = HearingTl::select('hearing_tl.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('hearing_tl.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'hearing_tl.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['hearing_tl' => $HearingTl]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $HearingTl = new HearingTl;
        $HearingTl->external_ear = $request->external_ear;
        $HearingTl->middle_ear = $request->middle_ear;
        $HearingTl->inner_ear = $request->inner_ear;
        $HearingTl->observations = $request->observations;
        $HearingTl->type_record_id = $request->type_record_id;
        $HearingTl->ch_record_id = $request->ch_record_id;
        $HearingTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Audición asociado al paciente exitosamente',
            'data' => ['hearing_tl' => $HearingTl->toArray()]
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
        $HearingTl = HearingTl::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Audición obtenido exitosamente',
            'data' => ['hearing_tl' => $HearingTl]
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
        $HearingTl = HearingTl::find($id);
        $HearingTl->external_ear = $request->external_ear;
        $HearingTl->middle_ear = $request->middle_ear;
        $HearingTl->inner_ear = $request->inner_ear;
        $HearingTl->observations = $request->observations;
        $HearingTl->type_record_id = $request->type_record_id;
        $HearingTl->ch_record_id = $request->ch_record_id;
        $HearingTl->save();

        return response()->json([
            'status' => true,
            'message' => 'Audición actualizado exitosamente',
            'data' => ['hearing_tl' => $HearingTl]
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
            $HearingTl = HearingTl::find($id);
            $HearingTl->delete();

            return response()->json([
                'status' => true,
                'message' => 'Audición eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Audición en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
