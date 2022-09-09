<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwOccupationalHistory;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwOccupationalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwOccupationalHistory = ChSwOccupationalHistory::with(
            'ch_sw_occupation',
            'ch_sw_seniority',
            'ch_sw_hours',
            'ch_sw_turn'
        );

        if ($request->_sort) {
            $ChSwOccupationalHistory->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwOccupationalHistory->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwOccupationalHistory = $ChSwOccupationalHistory->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwOccupationalHistory = $ChSwOccupationalHistory->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Historia ocupacional obtenido exitosamente',
            'data' => ['ch_sw_occupational_history' => $ChSwOccupationalHistory]
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


        $ChSwOccupationalHistory = ChSwOccupationalHistory::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->get()->toArray();

        if ($request->has_input) { //
            if ($request->has_input == 'true') { //
                $chrecord = ChRecord::find($id); //
                $ChSwOccupationalHistory = ChSwOccupationalHistory::select('ch_sw_occupational_history.*')
                    ->where('ch_record.admissions_id', $chrecord->admissions_id) //
                    ->leftJoin('ch_record', 'ch_record.id', 'ch_sw_occupational_history.ch_record_id') //
                    ->get()->toArray(); // tener cuidado con esta linea si hay dos get()->toArray()
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Valoracion obtenidos exitosamente',
            'data' => ['ch_sw_occupational_history' => $ChSwOccupationalHistory]
        ]);
    }

    public function store(Request $request): JsonResponse
    {


        $ChSwOccupationalHistory = new ChSwOccupationalHistory;

        if (isset($request->ch_activities)) {
            foreach ($request->ch_activities as $element) {
                if ($element == 'Trabajo') {
                    $ChSwOccupationalHistory->worked = $element;
                } else if ($element == 'Estudio') {
                    $ChSwOccupationalHistory->study = $element;
                } else if ($element == 'Hogar') {
                    $ChSwOccupationalHistory->home = $element;
                } else if ($element == 'Ninguna') {
                    $ChSwOccupationalHistory->none = $element;
                }
            }
        }

        // $ChSwOccupationalHistory->worked = $request->worked; 
        // $ChSwOccupationalHistory->study = $request->study; 
        // $ChSwOccupationalHistory->home = $request->home; 
        // $ChSwOccupationalHistory->none = $request->none; 
        $ChSwOccupationalHistory->ch_sw_occupation_id = $request->ch_sw_occupation_id;
        $ChSwOccupationalHistory->ch_sw_seniority_id = $request->ch_sw_seniority_id;
        $ChSwOccupationalHistory->ch_sw_hours_id = $request->ch_sw_hours_id;
        $ChSwOccupationalHistory->ch_sw_turn_id = $request->ch_sw_turn_id;
        $ChSwOccupationalHistory->observations = $request->observations;
        $ChSwOccupationalHistory->type_record_id = $request->type_record_id;
        $ChSwOccupationalHistory->ch_record_id = $request->ch_record_id;
        $ChSwOccupationalHistory->save();

        return response()->json([
            'status' => true,
            'message' => 'Historia ocupacional asociada al paciente exitosamente',
            'data' => ['ch_sw_occupational_history' => $ChSwOccupationalHistory->toArray()]
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
        $ChSwOccupationalHistory = ChSwOccupationalHistory::where('id', $id)
            ->with(
                'ch_sw_occupation',
                'ch_sw_seniority',
                'ch_sw_hours',
                'ch_sw_turn'
            )->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Historia ocupacional obtenida exitosamente',
            'data' => ['ch_sw_occupational_history' => $ChSwOccupationalHistory]
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
        $ChSwOccupationalHistory = ChSwOccupationalHistory::find($id);
        $ChSwOccupationalHistory->worked = $request->worked;
        $ChSwOccupationalHistory->study = $request->study;
        $ChSwOccupationalHistory->home = $request->home;
        $ChSwOccupationalHistory->none = $request->none;
        $ChSwOccupationalHistory->ch_sw_occupation_id = $request->ch_sw_occupation_id;
        $ChSwOccupationalHistory->ch_sw_seniority_id = $request->ch_sw_seniority_id;
        $ChSwOccupationalHistory->ch_sw_hours_id = $request->ch_sw_hours_id;
        $ChSwOccupationalHistory->ch_sw_turn_id = $request->ch_sw_turn_id;
        $ChSwOccupationalHistory->observations = $request->observations;
        $ChSwOccupationalHistory->type_record_id = $request->type_record_id;
        $ChSwOccupationalHistory->ch_record_id = $request->ch_record_id;
        $ChSwOccupationalHistory->save();

        return response()->json([
            'status' => true,
            'message' => 'Historia ocupacional  actualizada exitosamente',
            'data' => ['ch_sw_occupational_history' => $ChSwOccupationalHistory]
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
            $ChSwOccupationalHistory = ChSwOccupationalHistory::find($id);
            $ChSwOccupationalHistory->delete();

            return response()->json([
                'status' => true,
                'message' => 'Historia ocupacional  eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Historia ocupacional  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
