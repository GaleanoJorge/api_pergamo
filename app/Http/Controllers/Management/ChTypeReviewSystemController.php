<?php

namespace App\Http\Controllers\Management;

use App\Models\ChTypeReviewSystem;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ChTypeReviewSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $ChTypeReviewSystem = ChTypeReviewSystem::select();

        if ($request->_sort) {
            $ChTypeReviewSystem->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $ChTypeReviewSystem->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) == "false") {
            $ChTypeReviewSystem = $ChTypeReviewSystem->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $ChTypeReviewSystem = $ChTypeReviewSystem->paginate($per_page, '*', 'page', $page);
        }
        return response()->json([
            'status' => true,
            'message' => 'Rx sistema, Ex físicos obtenidos exitosamente',
            'data' => ['type_review_system' => $ChTypeReviewSystem]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $ChTypeReviewSystem = new ChTypeReviewSystem;
        $ChTypeReviewSystem->condition = $request->condition;
        $ChTypeReviewSystem->name_title = $request->name_title;
        $ChTypeReviewSystem->not_rated = $request->not_rated;
        $ChTypeReviewSystem->normal = $request->normal;
        $ChTypeReviewSystem->observation = $request->observation;
        $ChTypeReviewSystem->save();

        return response()->json([
            'status' => true,
            'message' => 'Rx sistema, Ex físico asociado al paciente exitosamente',
            'data' => ['type_review_system' => $ChTypeReviewSystem->toArray()]
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
        $ChTypeReviewSystem = ChTypeReviewSystem::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Rx sistema, Ex físico obtenido exitosamente',
            'data' => ['type_review_system' => $ChTypeReviewSystem]
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
        $ChTypeReviewSystem = ChTypeReviewSystem::find($id);
        $ChTypeReviewSystem->condition = $request->condition;
        $ChTypeReviewSystem->name_title = $request->name_title;
        $ChTypeReviewSystem->not_rated = $request->not_rated;
        $ChTypeReviewSystem->normal = $request->normal;
        $ChTypeReviewSystem->observation = $request->observation;
        $ChTypeReviewSystem->save();

        return response()->json([
            'status' => true,
            'message' => 'Rx sistema, Ex físico actualizado exitosamente',
            'data' => ['type_review_system' => $ChTypeReviewSystem]
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
            $ChTypeReviewSystem = ChTypeReviewSystem::find($id);
            $ChTypeReviewSystem->delete();

            return response()->json([
                'status' => true,
                'message' => 'Rx sistema, Ex físico eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Rx sistema, Ex físico en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
