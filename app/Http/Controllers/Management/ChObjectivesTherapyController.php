<?php

namespace App\Http\Controllers\Management;

use App\Models\ChObjectivesTherapy;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChObjectivesTherapyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChObjectivesTherapy = ChObjectivesTherapy::select();

        if ($request->_sort) {
            $ChObjectivesTherapy->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChObjectivesTherapy->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChObjectivesTherapy = $ChObjectivesTherapy->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChObjectivesTherapy = $ChObjectivesTherapy->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Objetivos obtenidos exitosamente',
            'data' => ['ch_objectives_therapy' => $ChObjectivesTherapy]
        ]);
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(int $id,int $type_record_id): JsonResponse
    {
        $ChObjectivesTherapy = ChObjectivesTherapy::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
        ->with('diagnosis','ch_background','ch_gynecologists') ->get()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'Objetivos  obtenidos exitosamente',
            'data' => ['ch_objectives_therapy' => $ChObjectivesTherapy]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChObjectivesTherapy = new ChObjectivesTherapy;
        $ChObjectivesTherapy->strengthen = $request->strengthen;
        $ChObjectivesTherapy->promote = $request->promote;
        $ChObjectivesTherapy->title = $request->title;
        $ChObjectivesTherapy->improve = $request->improve;
        $ChObjectivesTherapy->re_education = $request->re_education;
        $ChObjectivesTherapy->hold = $request->hold;
        $ChObjectivesTherapy->check = $request->check;
        $ChObjectivesTherapy->train = $request->train;
        $ChObjectivesTherapy->headline = $request->headline;
        $ChObjectivesTherapy->look_out = $request->look_out;
        $ChObjectivesTherapy->type_record_id = $request->type_record_id;
        $ChObjectivesTherapy->ch_record_id = $request->ch_record_id;
        $ChObjectivesTherapy->save();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos  asociados al paciente exitosamente',
            'data' => ['ch_objectives_therapy' => $ChObjectivesTherapy->toArray()]
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
        $ChObjectivesTherapy = ChObjectivesTherapy::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos  obtenidos exitosamente',
            'data' => ['ch_objectives_therapy' => $ChObjectivesTherapy]
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
        $ChObjectivesTherapy = ChObjectivesTherapy::find($id);
        $ChObjectivesTherapy->strengthen = $request->strengthen;
        $ChObjectivesTherapy->promote = $request->promote;
        $ChObjectivesTherapy->title = $request->title;
        $ChObjectivesTherapy->improve = $request->improve;
        $ChObjectivesTherapy->re_education = $request->re_education;
        $ChObjectivesTherapy->hold = $request->hold;
        $ChObjectivesTherapy->check = $request->check;
        $ChObjectivesTherapy->train = $request->train;
        $ChObjectivesTherapy->headline = $request->headline;
        $ChObjectivesTherapy->look_out = $request->look_out;
        $ChObjectivesTherapy->type_record_id = $request->type_record_id;
        $ChObjectivesTherapy->ch_record_id = $request->ch_record_id;
        $ChObjectivesTherapy->save();

        return response()->json([
            'status' => true,
            'message' => 'Objetivos actualizados exitosamente',
            'data' => ['ch_objectives_therapy' => $ChObjectivesTherapy]
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
            $ChObjectivesTherapy = ChObjectivesTherapy::find($id);
            $ChObjectivesTherapy->delete();

            return response()->json([
                'status' => true,
                'message' => 'Objetivos eliminados exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Objetivos en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
