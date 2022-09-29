<?php

namespace App\Http\Controllers\Management;

use App\Models\ChPsThought;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\ChRecord;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChPsThoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChPsThought = ChPsThought::select('ch_ps_thought.*')
        ->with(
            'ch_ps_speed',
            'ch_ps_delusional',
            'ch_ps_overrated',
            'ch_ps_obsessive',
            'ch_ps_association'
        );

        if ($request->_sort) {
            $ChPsThought->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChPsThought->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChPsThought = $ChPsThought->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChPsThought = $ChPsThought->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Pensamiento obtenidos exitosamente',
            'data' => ['ch_ps_thought' => $ChPsThought]
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


        $ChPsThought = ChPsThought::where('ch_record_id', $id)
        ->where('type_record_id', $type_record_id)
        ->with(         
            'ch_ps_speed',
            'ch_ps_delusional',
            'ch_ps_overrated',
            'ch_ps_obsessive',
            'ch_ps_association'
            )->get()->toArray();


        return response()->json([
            'status' => true,
            'message' => 'Pensamiento obtenida exitosamente',
            'data' => ['ch_ps_thought' => $ChPsThought]
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $ChPsThought = new ChPsThought;
        $ChPsThought->grade = $request->grade;
        $ChPsThought->contents = $request->contents;
        $ChPsThought->prevalent = $request->prevalent;
        $ChPsThought->observations = $request->observations;
        $ChPsThought->ch_ps_speed_id = $request->ch_ps_speed_id;
        $ChPsThought->ch_ps_delusional_id = $request->ch_ps_delusional_id;
        $ChPsThought->ch_ps_overrated_id = $request->ch_ps_overrated_id;
        $ChPsThought->ch_ps_obsessive_id = $request->ch_ps_obsessive_id;
        $ChPsThought->ch_ps_association_id = $request->ch_ps_association_id;
        $ChPsThought->type_record_id = $request->type_record_id;
        $ChPsThought->ch_record_id = $request->ch_record_id;
        $ChPsThought->save();

        return response()->json([
            'status' => true,
            'message' => 'Pensamiento asociada al paciente exitosamente',
            'data' => ['ch_ps_thought' => $ChPsThought->toArray()]
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
        $ChPsThought = ChPsThought::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Pensamiento obtenida exitosamente',
            'data' => ['ch_ps_thought' => $ChPsThought]
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
        $ChPsThought = ChPsThought::find($id);
        $ChPsThought->grade = $request->grade;
        $ChPsThought->contents = $request->contents;
        $ChPsThought->prevalent = $request->prevalent;
        $ChPsThought->observations = $request->observations;
        $ChPsThought->ch_ps_speed_id = $request->ch_ps_speed_id;
        $ChPsThought->ch_ps_delusional_id = $request->ch_ps_delusional_id;
        $ChPsThought->ch_ps_overrated_id = $request->ch_ps_overrated_id;
        $ChPsThought->ch_ps_obsessive_id = $request->ch_ps_obsessive_id;
        $ChPsThought->ch_ps_association_id = $request->ch_ps_association_id;
        $ChPsThought->type_record_id = $request->type_record_id;
        $ChPsThought->ch_record_id = $request->ch_record_id;
        $ChPsThought->save();

        return response()->json([
            'status' => true,
            'message' => 'Pensamiento actualizada exitosamente',
            'data' => ['ch_ps_thought' => $ChPsThought]
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
            $ChPsThought = ChPsThought::find($id);
            $ChPsThought->delete();

            return response()->json([
                'status' => true,
                'message' => 'Pensamiento eliminada exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Pensamiento en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
