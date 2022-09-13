<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwArmedConflict;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ChRecord;

class ChSwArmedConflictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwArmedConflict = ChSwArmedConflict::select();

        if ($request->_sort) {
            $ChSwArmedConflict->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwArmedConflict->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwArmedConflict = $ChSwArmedConflict->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwArmedConflict = $ChSwArmedConflict->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Información conflicto armado obtenido exitosamente',
            'data' => ['ch_sw_armed_conflict' => $ChSwArmedConflict]
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


        $ChSwArmedConflict = ChSwArmedConflict::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChSwArmedConflict = ChSwArmedConflict::select('ch_sw_armed_conflict.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->where('ch_sw_armed_conflict.type_record_id', 1)
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_sw_armed_conflict.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_sw_armed_conflict' => $ChSwArmedConflict]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChSwArmedConflict = new ChSwArmedConflict;
        $ChSwArmedConflict->victim = $request->victim;
        $ChSwArmedConflict->victim_time = $request->victim_time;
        $ChSwArmedConflict->subsidies = $request->subsidies;
        $ChSwArmedConflict->detail_subsidies = $request->detail_subsidies;
        $ChSwArmedConflict->municipality_id = $request->municipality_id;
        $ChSwArmedConflict->population_group_id = $request->population_group_id;
        $ChSwArmedConflict->ethnicity_id = $request->ethnicity_id;
        $ChSwArmedConflict->type_record_id = $request->type_record_id;
        $ChSwArmedConflict->ch_record_id = $request->ch_record_id;
        $ChSwArmedConflict->save();

        return response()->json([
            'status' => true,
            'message' => 'Información conflicto armado asociados al paciente exitosamente',
            'data' => ['ch_sw_armed_conflict' => $ChSwArmedConflict->toArray()]
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
        $ChSwArmedConflict = ChSwArmedConflict::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Información conflicto armado asociado exitosamente',
            'data' => ['ch_sw_armed_conflict' => $ChSwArmedConflict]
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
        $ChSwArmedConflict = ChSwArmedConflict::find($id);
        $ChSwArmedConflict->victim = $request->victim;
        $ChSwArmedConflict->victim_time = $request->victim_time;
        $ChSwArmedConflict->subsidies = $request->subsidies;
        $ChSwArmedConflict->detail_subsidies = $request->detail_subsidies;
        $ChSwArmedConflict->municipality_id = $request->municipality_id;
        $ChSwArmedConflict->population_group_id = $request->population_group_id;
        $ChSwArmedConflict->ethnicity_id = $request->ethnicity_id;
        $ChSwArmedConflict->type_record_id = $request->type_record_id;
        $ChSwArmedConflict->ch_record_id = $request->ch_record_id;
        $ChSwArmedConflict->save();

        return response()->json([
            'status' => true,
            'message' => 'Información conflicto armado actualizado exitosamente',
            'data' => ['ch_sw_armed_conflict' => $ChSwArmedConflict]
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
            $ChSwArmedConflict = ChSwArmedConflict::find($id);
            $ChSwArmedConflict->delete();

            return response()->json([
                'status' => true,
                'message' => 'Información conflicto armado eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Información conflicto armado en uso, no es posible eliminarla'
            ], 423);
        }
    }
}
