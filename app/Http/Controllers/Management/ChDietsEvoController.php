<?php

namespace App\Http\Controllers\Management;

use App\Models\ChDietsEvo;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChDietsEvoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChDietsEvo = ChDietsEvo::with('diet_component','diet_consistency'); /// Cargar 

        if ($request->_sort) {
            $ChDietsEvo->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChDietsEvo->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChDietsEvo = $ChDietsEvo->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChDietsEvo = $ChDietsEvo->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Dieta  obtenidos exitosamente',
            'data' => ['ch_diets_evo' => $ChDietsEvo]
        ]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $type_record_id
     * @return JsonResponse
     */
    public function getByRecord(Request $request, int $id,int $type_record_id): JsonResponse
    {
        
       
        $ChDietsEvo = ChDietsEvo::with('diet_component', 'diet_consistency', 'type_record', 'ch_record')
        ->where('ch_record_id', $id)->where('type_record_id',$type_record_id);
        
        if ($request->query("pagination", true) == "false") {
            $ChDietsEvo = $ChDietsEvo->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChDietsEvo = $ChDietsEvo->paginate($per_page, '*', 'page', $page);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Dieta Asociada  al paciente exitosamente',
            'data' => ['ch_diets_evo' => $ChDietsEvo]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $ChDietsEvo = new ChDietsEvo;
        $ChDietsEvo->diet_component_id = $request->diet_component_id;
        $ChDietsEvo->diet_consistency_id = $request->diet_consistency_id;
        $ChDietsEvo->observation = $request->observation;
        $ChDietsEvo->type_record_id = $request->type_record_id;
        $ChDietsEvo->ch_record_id = $request->ch_record_id;
        $ChDietsEvo->save();

        return response()->json([
            'status' => true,
            'message' => 'Dieta Asociada  al paciente exitosamente',
            'data' => ['ch_diets_evo' => $ChDietsEvo->toArray()]
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
        $ChDietsEvo = ChDietsEvo::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Dieta obtenido exitosamente',
            'data' => ['ch_diets_evo' => $ChDietsEvo]
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
        $ChDietsEvo = ChDietsEvo::find($id);
        $ChDietsEvo->diet_component_id = $request->diet_component_id;
        $ChDietsEvo->diet_consistency_id = $request->diet_consistency_id;
        $ChDietsEvo->observation = $request->observation;
        $ChDietsEvo->type_record_id = $request->type_record_id;
        $ChDietsEvo->ch_record_id = $request->ch_record_id;
        $ChDietsEvo->save();

        return response()->json([
            'status' => true,
            'message' => 'Dieta actualizado exitosamente',
            'data' => ['ch_diets_evo' => $ChDietsEvo]
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
            $ChDietsEvo = ChDietsEvo::find($id);
            $ChDietsEvo->delete();

            return response()->json([
                'status' => true,
                'message' => 'Dieta  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Dieta  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
