<?php

namespace App\Http\Controllers\Management;

use App\Models\ChRecommendationsEvo;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChRecommendationsEvoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChRecommendationsEvo = ChRecommendationsEvo::select();

        if ($request->_sort) {
            $ChRecommendationsEvo->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChRecommendationsEvo->where(
                'name',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->query('pagination', true) == 'false') {
            $ChRecommendationsEvo = $ChRecommendationsEvo->get()->toArray();
        } else {
            $page = $request->query('current_page', 1);
            $per_page = $request->query('per_page', 10);

            $ChRecommendationsEvo = $ChRecommendationsEvo->paginate(
                $per_page,
                '*',
                'page',
                $page
            );
        }

        return response()->json([
            'status' => true,
            'message' => 'Recomendación  obtenidos exitosamente',
            'data' => ['ch_recommendations_evo' => $ChRecommendationsEvo],
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
        $ChRecommendationsEvo = ChRecommendationsEvo::with(
            'recommendations_evo',
            'type_record',
            'ch_record'
        )
            ->where('ch_record_id', $id)
            ->where('type_record_id', $type_record_id);

        if ($request->query('pagination', true) == 'false') {
            $ChRecommendationsEvo = $ChRecommendationsEvo->get()->toArray();
        } else {
            $page = $request->query('current_page', 1);
            $per_page = $request->query('per_page', 10);

            $ChRecommendationsEvo = $ChRecommendationsEvo->paginate(
                $per_page,
                '*',
                'page',
                $page
            );
        }
        return response()->json([
            'status' => true,
            'message' => 'Recomendación Asociada  al paciente exitosamente',
            'data' => ['ch_recommendations_evo' => $ChRecommendationsEvo],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChRecommendationsEvo = new ChRecommendationsEvo();
        $ChRecommendationsEvo->recommendations_evo_id =
        $request->recommendations_evo_id;
        $ChRecommendationsEvo->patient_family_education = $request->patient_family_education;
        $ChRecommendationsEvo->type_record_id = $request->type_record_id;
        $ChRecommendationsEvo->ch_record_id = $request->ch_record_id;
        $ChRecommendationsEvo->save();

        return response()->json([
            'status' => true,
            'message' => 'Recomendación Asociada  al paciente exitosamente',
            'data' => [
                'ch_recommendations_evo' => $ChRecommendationsEvo->toArray(),
            ],
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
        $ChRecommendationsEvo = ChRecommendationsEvo::where('id', $id)
            ->get()
            ->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Recomendación obtenido exitosamente',
            'data' => ['ch_recommendations_evo' => $ChRecommendationsEvo],
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
        $ChRecommendationsEvo = ChRecommendationsEvo::find($id);
        $ChRecommendationsEvo->recommendations_evo_id = $request->recommendations_evo_id;
        $ChRecommendationsEvo->patient_family_education = $request->patient_family_education;
        $ChRecommendationsEvo->type_record_id = $request->type_record_id;
        $ChRecommendationsEvo->ch_record_id = $request->ch_record_id;
        $ChRecommendationsEvo->save();

        return response()->json([
            'status' => true,
            'message' => 'Recomendación actualizado exitosamente',
            'data' => ['ch_recommendations_evo' => $ChRecommendationsEvo],
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
            $ChRecommendationsEvo = ChRecommendationsEvo::find($id);
            $ChRecommendationsEvo->delete();

            return response()->json([
                'status' => true,
                'message' => 'Recomendación  eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json(
                [
                    'status' => false,
                    'message' =>
                    'Recomendación  en uso, no es posible eliminarlo',
                ],
                423
            );
        }
    }
}
