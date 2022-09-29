<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsRelationship;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsRelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsRelationship = ChPsRelationship::select('ch_ps_relationship.*')
        ->with(
            'ch_ps_awareness',
            'ch_ps_sleep'
        );

        if ($request->_sort) {
            $ChPsRelationship->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsRelationship->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsRelationship = $ChPsRelationship->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsRelationship = $ChPsRelationship->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Funciones de relación obtenidos exitosamente',
            'data' => ['ch_ps_relationship' => $ChPsRelationship]
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


        $ChPsRelationship = ChPsRelationship::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->with(         
            'ch_ps_awareness',
            'ch_ps_sleep'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Funciones de relación obtenida exitosamente',
            'data' => ['ch_ps_relationship' => $ChPsRelationship]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChPsRelationship = new ChPsRelationship;
        $ChPsRelationship->position = $request->position;
        $ChPsRelationship->self_care = $request->self_care;
        $ChPsRelationship->visual = $request->visual;
        $ChPsRelationship->verbal = $request->verbal;
        $ChPsRelationship->appearance = $request->appearance;
        $ChPsRelationship->att_observations = $request->att_observations;
        $ChPsRelationship->aw_observations = $request->aw_observations;
        $ChPsRelationship->sl_observations = $request->sl_observations;
        $ChPsRelationship->sex_observations = $request->sex_observations;
        $ChPsRelationship->fee_observations = $request->fee_observations;
        $ChPsRelationship->ex_observations = $request->ex_observations;
        $ChPsRelationship->attitude= $request->attitude;
        $ChPsRelationship->ch_ps_awareness_id = $request->ch_ps_awareness_id;
        $ChPsRelationship->ch_ps_sleep_id = $request->ch_ps_sleep_id;
        $ChPsRelationship->exam_others = $request->exam_others;
        $ChPsRelationship->sexuality = $request->sexuality;
        $ChPsRelationship->feeding = $request->feeding;
        $ChPsRelationship->excretion = $request->excretion;
        $ChPsRelationship->type_record_id = $request->type_record_id;
        $ChPsRelationship->ch_record_id = $request->ch_record_id;
        $ChPsRelationship->save();

        return response()->json([
            'status' => true,
            'message' => 'Funciones de relación asociada al paciente exitosamente',
            'data' => ['ch_ps_relationship' => $ChPsRelationship->toArray()]
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
        $ChPsRelationship = ChPsRelationship::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Funciones de relación obtenida exitosamente',
            'data' => ['ch_ps_relationship' => $ChPsRelationship]
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
        $ChPsRelationship = ChPsRelationship::find($id);
        $ChPsRelationship->position = $request->position;
        $ChPsRelationship->self_care = $request->self_care;
        $ChPsRelationship->visual = $request->visual;
        $ChPsRelationship->verbal = $request->verbal;
        $ChPsRelationship->appearance = $request->appearance;
        $ChPsRelationship->att_observations = $request->att_observations;
        $ChPsRelationship->aw_observations = $request->aw_observations;
        $ChPsRelationship->sl_observations = $request->sl_observations;
        $ChPsRelationship->sex_observations = $request->sex_observations;
        $ChPsRelationship->fee_observations = $request->fee_observations;
        $ChPsRelationship->ex_observations = $request->ex_observations;
        $ChPsRelationship->attitude= $request->attitude;
        $ChPsRelationship->ch_ps_awareness_id = $request->ch_ps_awareness_id;
        $ChPsRelationship->ch_ps_sleep_id = $request->ch_ps_sleep_id;
        $ChPsRelationship->exam_others = $request->exam_others;
        $ChPsRelationship->sexuality = $request->sexuality;
        $ChPsRelationship->feeding = $request->feeding;
        $ChPsRelationship->excretion = $request->excretion;
        $ChPsRelationship->type_record_id = $request->type_record_id;
        $ChPsRelationship->ch_record_id = $request->ch_record_id;
        $ChPsRelationship->save();

        return response()->json([
            'status' => true,
            'message' => 'Funciones de relación actualizada exitosamente',
            'data' => ['ch_ps_relationship' => $ChPsRelationship]
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
            $ChPsRelationship = ChPsRelationship::find($id);
            $ChPsRelationship->delete();

            return response()->json([
                'status' => true,
                'message' => 'Funciones de relación eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Funciones de relación en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
