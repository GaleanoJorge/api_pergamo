<?php

namespace App\Http\Controllers\Management;

use App\Models\RecommendationsEvo;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class RecommendationsEvoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $RecommendationsEvo =RecommendationsEvo::select();

        if ($request->_sort) {
            $RecommendationsEvo->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $RecommendationsEvo->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $RecommendationsEvo = $RecommendationsEvo->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $RecommendationsEvo = $RecommendationsEvo->paginate($per_page, '*', 'page', $page);
        }


        return response()->json([
            'status' => true,
            'message' => 'Recomendación  obtenidos exitosamente',
            'data' => ['recommendations_evo' => $RecommendationsEvo]
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
        
       
        $RecommendationsEvo =RecommendationsEvo::where('ch_record_id', $id)->where('type_record_id',$type_record_id)
            ->get()->toArray();
        

        return response()->json([
            'status' => true,
            'message' => 'Recomendación Asociada  al paciente exitosamente',
            'data' => ['recommendations_evo' => $RecommendationsEvo]
        ]);
    }
    

    public function store(Request $request): JsonResponse
    {
        $RecommendationsEvo = new RecommendationsEvo;
        $RecommendationsEvo->name = $request->name;
        $RecommendationsEvo->description = $request->description;
        $RecommendationsEvo->save();

        return response()->json([
            'status' => true,
            'message' => 'Recomendación Asociada  al paciente exitosamente',
            'data' => ['recommendations_evo' => $RecommendationsEvo->toArray()]
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
        $RecommendationsEvo =RecommendationsEvo::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Recomendación obtenido exitosamente',
            'data' => ['recommendations_evo' => $RecommendationsEvo]
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
        $RecommendationsEvo =RecommendationsEvo::find($id);
        $RecommendationsEvo->name = $request->name;
        $RecommendationsEvo->description = $request->description;
       
        $RecommendationsEvo->save();

        return response()->json([
            'status' => true,
            'message' => 'Recomendación actualizado exitosamente',
            'data' => ['recommendations_evo' => $RecommendationsEvo]
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
            $RecommendationsEvo =RecommendationsEvo::find($id);
            $RecommendationsEvo->delete();

            return response()->json([
                'status' => true,
                'message' => 'Recomendación  eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Recomendación  en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
