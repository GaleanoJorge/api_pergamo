<?php

namespace App\Http\Controllers\Management;

use App\Models\ChSwOccupationalActivities;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChAssSigns;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChSwOccupationalActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChSwOccupationalActivities = ChSwOccupationalActivities::select();

        if ($request->_sort) {
            $ChSwOccupationalActivities->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChSwOccupationalActivities->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChSwOccupationalActivities = $ChSwOccupationalActivities->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChSwOccupationalActivities = $ChSwOccupationalActivities->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica obtenida exitosamente',
            'data' => ['ch_sw_occupational_activities' => $ChSwOccupationalActivities]
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


        $ChSwOccupationalActivities = ChSwOccupationalActivities::where('ch_record_id', $id)->where('type_record_id', $type_record_id)
            ->with(
                'ch_sw_activities',
                'ch_sw_occupational_history'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica obtenida exitosamente',
            'data' => ['ch_sw_occupational_activities' => $ChSwOccupationalActivities]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $validate = ChSwOccupationalActivities::where('ch_record_id', $request->ch_record_id)->where('ch_ass_pattern_id', $request->ch_ass_pattern_id)
            ->where('ch_sw_activities_id', $request->ch_sw_activities_id)
            ->where('ch_sw_occupational_history_id', $request->ch_sw_occupational_history_id)
            ->first();

        $ChSwOccupationalActivities = new ChSwOccupationalActivities;

        $ChSwOccupationalActivities->ch_sw_activity_id = $request->ch_sw_activity_id;
        $ChSwOccupationalActivities->ch_sw_occupational_history_id = $request->ch_sw_occupational_history_id;





        $ChSwOccupationalActivities->save();

        $ChAssSigns = new ChAssSigns;
        $ChSwOccupationalActivities->ch_sw_activity_id = $request->ch_sw_activity_id;
        $ChSwOccupationalActivities->ch_sw_occupational_history_id = $request->ch_sw_occupational_history_id;

        $ChAssSigns->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica asociada al paciente exitosamente',
            'data' => ['ch_sw_occupational_activities' => $ChSwOccupationalActivities->toArray()]
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
        $ChSwOccupationalActivities = ChSwOccupationalActivities::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica asociada exitosamente',
            'data' => ['ch_sw_occupational_activities' => $ChSwOccupationalActivities]
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
        $ChSwOccupationalActivities = ChSwOccupationalActivities::find($id);
        $ChSwOccupationalActivities->ch_ass_pattern = $request->ch_ass_pattern;
        $ChSwOccupationalActivities->ch_ass_swing = $request->ch_ass_swing;
        $ChSwOccupationalActivities->ch_ass_frequency = $request->ch_ass_frequency;
        $ChSwOccupationalActivities->ch_ass_mode = $request->ch_ass_mode;
        $ChSwOccupationalActivities->ch_ass_cough = $request->ch_ass_cough;
        $ChSwOccupationalActivities->ch_ass_chest_type = $request->ch_ass_chest_type;
        $ChSwOccupationalActivities->ch_ass_chest_symmetry_id = $request->ch_ass_chest_symmetry_id;
        $ChSwOccupationalActivities->type_record_id = $request->type_record_id;
        $ChSwOccupationalActivities->ch_record_id = $request->ch_record_id;
        $ChSwOccupationalActivities->save();

        return response()->json([
            'status' => true,
            'message' => 'Valoración terapéutica actualizada exitosamente',
            'data' => ['ch_sw_occupational_activities' => $ChSwOccupationalActivities]
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
            $ChSwOccupationalActivities = ChSwOccupationalActivities::find($id);
            $ChSwOccupationalActivities->delete();

            return response()->json([
                'status' => true,
                'message' => 'Valoración terapéutica eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Valoración terapéutica en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
