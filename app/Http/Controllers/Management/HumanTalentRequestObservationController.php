<?php

namespace App\Http\Controllers\Management;

use App\Models\HumanTalentRequestObservation;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class HumanTalentRequestObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $HumanTalentRequestObservation = HumanTalentRequestObservation::select();


        if ($request->_sort) {
            $HumanTalentRequestObservation->orderBy($request->_sort, $request->_order);
        }

        if ($request->search) {
            $HumanTalentRequestObservation->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $HumanTalentRequestObservation->where('category', $request->category);
        }

        if ($request->query("pagination", true) == "false") {
            $HumanTalentRequestObservation = $HumanTalentRequestObservation->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $HumanTalentRequestObservation = $HumanTalentRequestObservation->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Personal obtenidos exitosamente',
            'data' => ['human_talent_request_observation' => $HumanTalentRequestObservation]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $HumanTalentRequestObservation = new HumanTalentRequestObservation;
        $HumanTalentRequestObservation->name = $request->name;
        $HumanTalentRequestObservation->category = $request->category;

        $HumanTalentRequestObservation->save();

        return response()->json([
            'status' => true,
            'message' => 'Personal creada exitosamente',
            'data' => ['human_talent_request_observation' => $HumanTalentRequestObservation->toArray()]
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
        $HumanTalentRequestObservation = HumanTalentRequestObservation::where('id', $id)
            ->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Personal obtenido exitosamente',
            'data' => ['human_talent_request_observation' => $HumanTalentRequestObservation]
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
        $HumanTalentRequestObservation = HumanTalentRequestObservation::find($id);
        $HumanTalentRequestObservation->name = $request->name;
        $HumanTalentRequestObservation->category = $request->category;

        $HumanTalentRequestObservation->save();

        return response()->json([
            'status' => true,
            'message' => 'Petición actualizada exitosamente',
            'data' => ['human_talent_request_observation' => $HumanTalentRequestObservation]
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
            $HumanTalentRequestObservation = HumanTalentRequestObservation::find($id);
            $HumanTalentRequestObservation->delete();

            return response()->json([
                'status' => true,
                'message' => 'Personal eliminado exitosamente'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Personal esta en uso, no es posible eliminarlo'
            ], 423);
        }
    }
}
